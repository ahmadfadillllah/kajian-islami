<?php

namespace App\Http\Controllers;

use App\Models\Majelis;
use App\Models\Masjid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MajelisController extends Controller
{
    //
    public function index()
    {
        $dataMajelis = DB::table('majelis as ml')->leftJoin('masjid as mj', 'ml.masjid_id', 'mj.id')
        ->select(
            'ml.*',
            'mj.nama as nama_masjid'
        )->where('ml.statusenabled', true)->get();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('majelis.index', compact('dataMajelis', 'dataMasjid'));
    }

    public function insert()
    {
        $dataMasjid = Masjid::where('statusenabled', true)->where('pengurus', Auth::user()->uuid)->get();

        return view('majelis.insert', compact('dataMasjid'));
    }

    public function post(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jenis' => 'required|string',
                'kegiatan' => 'required|string',
            ]);

            $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;

            Majelis::create([
                'uuid' => (string) Uuid::uuid4(),
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'kegiatan' => $request->kegiatan,
                'tanggal_kegiatan' => Carbon::createFromFormat('d/m/Y', $request->tanggalKegiatan)->format('Y-m-d'),
                'keterangan' => $request->keterangan,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'masjid_id' => $request->masjid_id,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('majelis.index')->with('success', 'Berhasil menambahkan Majelis');
        } catch (\Throwable $th) {
            return redirect()->route('majelis.index')->with('info', $th->getMessage());
        }
    }

    public function edit($uuid)
    {
        $dataMajelis = DB::table('majelis as ml')->leftJoin('masjid as mj', 'ml.masjid_id', 'mj.id')
        ->select(
            'ml.*',
            'mj.nama as nama_masjid'
        )->where('ml.uuid', $uuid)->first();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('majelis.edit', compact('dataMajelis', 'dataMasjid'));
    }

    public function update(Request $request, $uuid)
    {
        try {

            if($request->type == 'Gratis'){
                $harga = null;
            }else{
                $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;
            }
            Majelis::where('uuid', $uuid) ->update([
                'jenis' => $request->jenis,
                'kegiatan' => $request->kegiatan,
                'tanggal_kegiatan' => Carbon::createFromFormat('d/m/Y', $request->tanggalKegiatan)->format('Y-m-d'),
                'keterangan' => $request->keterangan,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'masjid_id' => $request->masjid_id,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('majelis.index')->with('success', 'Berhasil mengupdate Majelis');
        } catch (\Throwable $th) {

            return redirect()->route('majelis.index')->with('info', $th->getMessage());
        }
    }


    public function delete($uuid)
    {
        try {
            Majelis::where('uuid', $uuid) ->update(['statusenabled' => false]);

            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
