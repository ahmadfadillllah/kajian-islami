<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PayloadEXExport implements FromCollection, WithEvents, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;
    protected $shift;
    protected $ex;

    public function __construct($startDate, $endDate, $ex, $shift)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->ex = $ex;
        $this->shift = $shift;

    }

    public function collection()
    {
        $data = DB::select('SET NOCOUNT ON;EXEC DAILY.dbo.GET_PAYLOAD_2023_2024_EX @StartDate = ?, @endDate = ?, @EX_IDs = ?, @Shift = ?', [
            $this->startDate,
            $this->endDate,
            $this->ex,
            $this->shift
        ]);

        return collect($data)->map(function ($item) {
            return [
                $item->VHC_ID,
                $item->LOD_LOADERID,
                $item->OPR_NRP,
                $item->PERSONALNAME,
                $item->OPR_SHIFTNO,
                $item->OPR_REPORTTIME ? Carbon::parse($item->OPR_REPORTTIME)->format('Y-m-d H:i') : '-',
                $item->LOGIN_TIME     ? Carbon::parse($item->LOGIN_TIME)->format('Y-m-d H:i')     : '-',
                $item->LOGOUT_TIME    ? Carbon::parse($item->LOGOUT_TIME)->format('Y-m-d H:i')    : '-',
                number_format((float) $item->RIT_TONNAGE, 1),
                $item->TONNAGE_CATEGORY,
            ];
        });
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(50);
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Gaya untuk header multilevel
            'A1:J1' => [
                'font' => [
                    'bold' => true,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => 'D8E4BC', // Warna kuning
                    ],
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'VHC_ID',
            'LOD_LOADERID',
            'OPR_NRP',
            'PERSONALNAME',
            'OPR_SHIFTNO',
            'OPR_REPORTTIME',
            'LOGIN_TIME',
            'LOGOUT_TIME',
            'RIT_TONNAGE',
            'TONNAGE_CATEGORY',
        ];
    }
}
