<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\TPA;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class TPAController extends Controller
{
    //
    public function index()
    {
        $dataTPA = DB::table('tpa')->leftJoin('masjid as mj', 'tpa.masjid_id', 'mj.id')
        ->select(
            'tpa.*',
            'mj.nama as nama_masjid'
        )->where('tpa.statusenabled', true)->get();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('tpa.index', compact('dataTPA', 'dataMasjid'));
    }

    public function insert()
    {
        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('tpa.insert', compact('dataMasjid'));
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

            TPA::create([
                'uuid' => (string) Uuid::uuid4(),
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'ustadz' => $request->ustadz,
                'durasi' => $request->durasi,
                'tanggal_kegiatan' => Carbon::createFromFormat('d/m/Y', $request->tanggalKegiatan)->format('Y-m-d'),
                'keterangan' => $request->keterangan,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'masjid_id' => $request->masjid_id,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('tpa.index')->with('success', 'Berhasil menambahkan TPA');
        } catch (\Throwable $th) {
            return redirect()->route('tpa.index')->with('info', $th->getMessage());
        }
    }

    public function edit($uuid){
        $dataMasjid = Masjid::where('statusenabled', true)->get();
        $dataTPA = DB::table('tpa as tpa')->leftJoin('masjid as mj', 'tpa.masjid_id', 'mj.id')
        ->select(
            'tpa.*',
            'mj.nama as nama_masjid'
        )->where('tpa.uuid', $uuid)->first();

        return view('tpa.edit', compact('dataTPA', 'dataMasjid'));
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
            TPA::where('uuid', $uuid) ->update([
                'jenis' => $request->jenis,
                'ustadz' => $request->ustadz,
                'durasi' => $request->durasi,
                'tanggal_kegiatan' => Carbon::createFromFormat('d/m/Y', $request->tanggalKegiatan)->format('Y-m-d'),
                'keterangan' => $request->keterangan,
                'masjid_id' => $request->masjid_id,
                'deskripsi' => $request->deskripsi,
                'streaming' => $request->streaming,
                'type' => $request->type,
                'harga' => $harga,
            ]);

            return redirect()->route('tpa.index')->with('success', 'Berhasil mengupdate TPA');
        } catch (\Throwable $th) {

            return redirect()->route('tpa.index')->with('info', $th->getMessage());
        }
    }


    public function delete($uuid)
    {
        try {
            TPA::where('uuid', $uuid) ->update(['statusenabled' => false]);

            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
