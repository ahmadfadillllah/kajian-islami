<?php

namespace App\Http\Controllers;

use App\Models\Kultum;
use App\Models\Masjid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class KultumController extends Controller
{
    //
    public function index()
    {
        $dataKultum = DB::table('kultum as kt')->leftJoin('masjid as mj', 'kt.masjid_id', 'mj.id')
        ->select(
            'kt.*',
            'mj.nama as nama_masjid'
        )->where('kt.statusenabled', true)->get();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('kultum.index', compact('dataKultum', 'dataMasjid'));
    }

    public function insert()
    {

        $dataMasjid = Masjid::where('statusenabled', true)->where('pengurus', Auth::user()->uuid)->get();

        return view('kultum.insert', compact('dataMasjid'));
    }

    public function post(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'judul' => 'required|string',
                'ustadz' => 'required|string',
                'durasi' => 'required|string',
            ]);

            $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;

            Kultum::create([
                'uuid' => (string) Uuid::uuid4(),
                'judul' => $request->judul,
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

            return redirect()->route('kultum.index')->with('success', 'Berhasil menambahkan Kultum');
        } catch (\Throwable $th) {
            return redirect()->route('kultum.index')->with('info', $th->getMessage());
        }
    }

    public function edit($uuid)
    {
        $dataKultum = DB::table('kultum as kt')->leftJoin('masjid as mj', 'kt.masjid_id', 'mj.id')
        ->select(
            'kt.*',
            'mj.nama as nama_masjid'
        )->where('kt.uuid', $uuid)->first();

        $dataMasjid = Masjid::where('statusenabled', true)->get();

        return view('kultum.edit', compact('dataKultum', 'dataMasjid'));
    }

    public function update(Request $request, $uuid)
    {
        try {

            if($request->type == 'Gratis'){
                $harga = null;
            }else{
                $harga = $request->filled('harga') ? preg_replace('/[^0-9]/', '', $request->harga) : null;
            }

            Kultum::where('uuid', $uuid) ->update([
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

            return redirect()->route('kultum.index')->with('success', 'Berhasil mengupdate Kultum');
        } catch (\Throwable $th) {

            return redirect()->route('kultum.index')->with('info', $th->getMessage());
        }
    }


    public function delete($uuid)
    {
        try {
            Kultum::where('uuid', $uuid) ->update(['statusenabled' => false]);

            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
