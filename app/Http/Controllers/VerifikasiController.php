<?php

namespace App\Http\Controllers;

use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajian;
use App\Models\TPA;
use App\Models\Kultum;
use App\Models\Majelis;
use App\Models\HariBesar;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

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

        $verifikasiQuery = DB::table('verifikasi as vr')
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
            );

        if ($user->role === 'Masyarakat') {
            $verifikasiQuery->where('vr.users_uuid', $user->uuid);
        }

        $verifikasi = $verifikasiQuery->get();

        foreach ($verifikasi as $item) {
            $item->detail = $dataKajian->first(function ($kajian) use ($item) {
                return $kajian->uuid === $item->uuid_reference && $kajian->kategori === $item->kategori;
            });
        }


        return view('verifikasi.index', compact('verifikasi'));
    }

    public function verified($uuid)
    {
        $data = Verifikasi::where('uuid', $uuid)->first();
        try {
            if($data->verified == null){
                Verifikasi::where('uuid', $data->uuid)->update(['verified' => true]);
                return redirect()->back()->with('success', 'Data berhasil diupdate');
            }else{
                Verifikasi::where('uuid', $data->uuid)->update(['verified' => false]);
                return redirect()->back()->with('success', 'Data berhasil diupdate');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Data gagal diupdate');
        }
    }
}
