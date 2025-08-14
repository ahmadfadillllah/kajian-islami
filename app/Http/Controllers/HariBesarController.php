<?php

namespace App\Http\Controllers;

use App\Models\HariBesar;
use App\Models\Masjid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class HariBesarController extends Controller
{
    //
    public function index()
    {
        $dataHariBesar = DB::table('haribesar as hb')->leftJoin('masjid as mj', 'hb.masjid_id', 'mj.id')
        ->select(
            'hb.*',
            'mj.nama as nama_masjid'
        )->where('hb.statusenabled', true)->get();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('hariBesar.index', compact('dataHariBesar', 'dataMasjid'));
    }

    public function insert()
    {
        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('hariBesar.insert', compact('dataMasjid'));
    }

    public function post(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jenis' => 'required|string',
                'penceramah' => 'required|string',
                'durasi' => 'required|string',
            ]);

            $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;

            HariBesar::create([
                'uuid' => (string) Uuid::uuid4(),
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'penceramah' => $request->penceramah,
                'imam' => $request->imam,
                'tanggal_kegiatan' => Carbon::createFromFormat('d/m/Y', $request->tanggalKegiatan)->format('Y-m-d'),
                'durasi' => $request->durasi,
                'keterangan' => $request->keterangan,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'masjid_id' => $request->masjid_id,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('haribesar.index')->with('success', 'Berhasil menambahkan Hari Besar');
        } catch (\Throwable $th) {
            return redirect()->route('haribesar.index')->with('info', $th->getMessage());
        }
    }

    public function edit($uuid)
    {
        $dataHariBesar = DB::table('haribesar as hb')->leftJoin('masjid as mj', 'hb.masjid_id', 'mj.id')
        ->select(
            'hb.*',
            'mj.nama as nama_masjid'
        )->where('hb.uuid', $uuid)->first();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('hariBesar.edit', compact('dataHariBesar', 'dataMasjid'));
    }

    public function update(Request $request, $uuid)
    {
        try {

            if($request->type == 'Gratis'){
                $harga = null;
            }else{
                $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;
            }
            HariBesar::where('uuid', $uuid) ->update([
                'jenis' => $request->jenis,
                'penceramah' => $request->penceramah,
                'imam' => $request->imam,
                'tanggal_kegiatan' => Carbon::createFromFormat('d/m/Y', $request->tanggalKegiatan)->format('Y-m-d'),
                'durasi' => $request->durasi,
                'keterangan' => $request->keterangan,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'masjid_id' => $request->masjid_id,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('haribesar.index')->with('success', 'Berhasil mengupdate Hari Besar');
        } catch (\Throwable $th) {

            return redirect()->route('haribesar.index')->with('info', $th->getMessage());
        }
    }


    public function delete($uuid)
    {
        try {
            HariBesar::where('uuid', $uuid) ->update(['statusenabled' => false]);

            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
