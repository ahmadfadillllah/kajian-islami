<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\Pengajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PengajianController extends Controller
{
    //

    public function index()
    {
        $dataPengajian = DB::table('pengajian as pg')->leftJoin('masjid as mj', 'pg.masjid_id', 'mj.id')
        ->select(
            'pg.*',
            'mj.nama as nama_masjid'
        )->where('pg.statusenabled', true)->get();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('pengajian.index', compact('dataPengajian', 'dataMasjid'));
    }

    public function insert(Request $request)
    {
        $dataMasjid = Masjid::where('statusenabled', true)->get();
        return view('pengajian.insert', compact('dataMasjid'));
    }

    public function post(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jenis' => 'required|string',
                'ustadz' => 'required|string',
                'durasi' => 'required|string',
            ]);

            $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;

            Pengajian::create([
                'uuid' => (string) Uuid::uuid4(),
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'ustadz' => $request->ustadz,
                'durasi' => $request->durasi,
                'keterangan' => $request->keterangan,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'masjid_id' => $request->masjid_id,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('pengajian.index')->with('success', 'Berhasil menambahkan Pengajian');
        } catch (\Throwable $th) {
            return redirect()->route('pengajian.index')->with('info', $th->getMessage());
        }
    }

    public function edit($uuid){
        $dataMasjid = Masjid::where('statusenabled', true)->get();
        $dataPengajian = DB::table('pengajian as pg')->leftJoin('masjid as mj', 'pg.masjid_id', 'mj.id')
        ->select(
            'pg.*',
            'mj.nama as nama_masjid'
        )->where('pg.uuid', $uuid)->first();

        return view('pengajian.edit', compact('dataPengajian', 'dataMasjid'));
    }

    public function update(Request $request, $uuid)
    {
        // dd($request->all());
        try {

            if($request->type == 'Gratis'){
                $harga = null;
            }else{
                $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;
            }
            Pengajian::where('uuid', $uuid) ->update([
                'jenis' => $request->jenis,
                'ustadz' => $request->ustadz,
                'durasi' => $request->durasi,
                'keterangan' => $request->keterangan,
                'masjid_id' => $request->masjid_id,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('pengajian.index')->with('success', 'Berhasil mengupdate Pengajian');
        } catch (\Throwable $th) {

            return redirect()->route('pengajian.index')->with('info', $th->getMessage());
        }
    }


    public function delete($uuid)
    {
        try {
            Pengajian::where('uuid', $uuid) ->update(['statusenabled' => false]);

            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
