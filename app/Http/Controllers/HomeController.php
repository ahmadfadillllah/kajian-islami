<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\HariBesar;
use App\Models\Kultum;
use App\Models\Majelis;
use App\Models\Pengajian;
use App\Models\TPA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class HomeController extends Controller
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

        $dataKajian = $pengajian
            ->union($tpa)
            ->union($kultum)
            ->union($majelis)
            ->union($haribesar)
            ->get();

        return view('home.index', compact('dataKajian'));
    }

    public function detail($kategori, $uuid)
    {

        $pengajian = Pengajian::select(
            'uuid',
            'nama',
            DB::raw("'pengajian' as kategori"),
            'type',
            'harga',
            'streaming',
            'deskripsi'
        )->where('statusenabled', true);

        $tpa = TPA::select(
            'uuid',
            'nama',
            DB::raw("'tpa' as kategori"),
            'type',
            'harga',
            'streaming',
            'deskripsi'
        )->where('statusenabled', true);

        $kultum = Kultum::select(
            'uuid',
            'judul as nama',
            DB::raw("'kultum' as kategori"),
            'type',
            'harga',
            'streaming',
            'deskripsi'
        )->where('statusenabled', true);

        $majelis = Majelis::select(
            'uuid',
            'nama',
            DB::raw("'majelis' as kategori"),
            'type',
            'harga',
            'streaming',
            'deskripsi'
        )->where('statusenabled', true);

        $haribesar = HariBesar::select(
            'uuid',
            'nama',
            DB::raw("'hari besar' as kategori"),
            'type',
            'harga',
            'streaming',
            'deskripsi'
        )->where('statusenabled', true);

        $dataKajian = DB::table(function ($query) use ($pengajian, $tpa, $kultum, $majelis, $haribesar) {
            $query->from($pengajian)
                ->union($tpa)
                ->union($kultum)
                ->union($majelis)
                ->union($haribesar);
        }, 'kajian')
        ->where('uuid', $uuid)
        ->first();


        return view('home.detail', compact('dataKajian'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function contactPost(Request $request)
    {
        try {
            Contact::create([
                'uuid' => (string) Uuid::uuid4(),
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'email' => $request->email,
                'no_whatsapp' => $request->no_whatsapp,
                'pesan' => $request->pesan,
            ]);

            return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Gagal mengirim pesan. Silakan coba lagi nanti');
        }
    }
}
