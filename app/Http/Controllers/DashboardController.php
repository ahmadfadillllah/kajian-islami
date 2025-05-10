<?php

namespace App\Http\Controllers;

use App\Models\HariBesar;
use App\Models\Kultum;
use App\Models\Majelis;
use App\Models\Pengajian;
use App\Models\TPA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $pengajian = Pengajian::select(
            'uuid',
            'nama',
            DB::raw("'pengajian' as kategori"),
            'type',
            'harga'
        )->where('statusenabled', true);

        $pengajian1 = Pengajian::select(
            'uuid',
            'nama',
            DB::raw("'pengajian' as kategori"),
            'type',
            'harga'
        )->where('statusenabled', true);


        $tpa = TPA::select(
            'uuid',
            'nama',
            DB::raw("'tpa' as kategori"),
            'type',
            'harga'
        )->where('statusenabled', true);

        $kultum = Kultum::select(
            'uuid',
            'judul as nama',
            DB::raw("'kultum' as kategori"),
            'type',
            'harga'
        )->where('statusenabled', true);

        $majelis = Majelis::select(
            'uuid',
            'nama',
            DB::raw("'majelis' as kategori"),
            'type',
            'harga'
        )->where('statusenabled', true);

        $haribesar = HariBesar::select(
            'uuid',
            'nama',
            DB::raw("'hari besar' as kategori"),
            'type',
            'harga'
        )->where('statusenabled', true);

        $dataKajian = $pengajian1
            ->union($tpa)
            ->union($kultum)
            ->union($majelis)
            ->union($haribesar)
            ->get();

        $verifikasi = DB::table('verifikasi as vr')
            ->leftJoin('users as us', 'vr.users_uuid', '=', 'us.uuid')
            ->select(
                'vr.uuid',
                'vr.uuid_reference',
                'vr.kategori',
                'vr.bukti_pembayaran',
                'vr.verified',
                'vr.users_uuid',
                'us.username',
                'us.name'
            )->get();


        foreach ($verifikasi as $item) {
            $item->detail = $dataKajian->first(function ($kajian) use ($item) {
                return $kajian->uuid === $item->uuid_reference && $kajian->kategori === $item->kategori;
            });
        }

        $data = [
            'pengajian' => $pengajian,
            'tpa' => $tpa,
            'kultum' => $kultum,
            'majelis' => $majelis,
            'haribesar' => $haribesar,
            'verifikasi' => $verifikasi
        ];

        return view('dashboard.index', compact('data'));
    }
}
