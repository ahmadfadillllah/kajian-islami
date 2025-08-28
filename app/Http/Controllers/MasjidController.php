<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class MasjidController extends Controller
{
    //
    public function index()
    {
        $dataMasjid = DB::table('masjid as mj')->leftJoin('users as us', 'mj.pengurus', 'us.uuid')->select(
            'mj.id',
            'mj.uuid',
            'mj.statusenabled',
            'mj.nama',
            'mj.alamat',
            'mj.imam',
            'mj.gambar',
            'mj.pengurus as uuid_pengurus',
            'us.name as nama_pengurus',
            )->where('mj.statusenabled', true);

        if(Auth::user()->role == 'Admin'){
            $dataMasjid = $dataMasjid->get();
        }else{
            $dataMasjid = $dataMasjid->where('pengurus', Auth::user()->uuid)->get();
        }
        $dataPengurus = User::where('statusenabled', true)->where('role', 'Pengurus')->get();

        return view('masjid.index', compact('dataMasjid', 'dataPengurus'));
    }

    public function insert(Request $request)
    {
        try {
            // Validasi (opsional tapi disarankan)
            $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'pengurus' => 'required|string',
                'imam' => 'required|string',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10000',
            ]);

            // Proses upload gambar jika ada
            $path = null;
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('masjid', 'public');
            }

            // Simpan data masjid
            Masjid::create([
                'uuid' => (string) Uuid::uuid4(),
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'pengurus' => $request->pengurus,
                'imam' => $request->imam,
                'gambar' => $path, // Simpan path gambar jika ada
            ]);

            return redirect()->back()->with('success', 'Berhasil menambahkan Masjid');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update(Request $request, $uuid)
    {
        try {
            Masjid::where('uuid', $uuid) ->update([
                'alamat' => $request->alamat,
                'pengurus' => $request->pengurus,
                'imam' => $request->imam,
            ]);

            return redirect()->back()->with('success', 'Berhasil mengupdate Masjid');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function updateGambar(Request $request, $uuid)
    {
        try {
            $masjid = Masjid::where('uuid', $uuid)->firstOrFail();

            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($masjid->gambar && Storage::disk('public')->exists($masjid->gambar)) {
                    Storage::disk('public')->delete($masjid->gambar);
                }

                // Simpan gambar baru
                $path = $request->file('gambar')->store('masjid', 'public');
                $masjid->gambar = $path;
                $masjid->save();
            }

            return redirect()->back()->with('success', 'Gambar Masjid berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function delete($uuid)
    {
        try {
            Masjid::where('uuid', $uuid) ->update(['statusenabled' => false]);

            return redirect()->back()->with('success', 'Berhasil menghapus Masjid');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
