<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->statusenabled == true) {
                return redirect()->route('dashboard.index')->with('success', 'Selamat Datang');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->with('info', 'Akun Anda tidak diaktifkan.');
            }
        }

        return redirect()->back()->with('info', 'Username atau password salah');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_post(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'uuid' => (string) Uuid::uuid4(),
            'username' => $request->username,
            'name' => $request->name,
            'role' => 'Masyarakat',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Berhasil registrasi akun');
    }

    public function verification(Request $request)
    {
        if ($request->hasFile('bukti')) {

            $path = $request->file('bukti')->store('bukti_pembayaran', 'public');

            Verifikasi::create([
                'uuid' => (string) Uuid::uuid4(),
                'users_uuid' => Auth::user()->uuid,
                'bukti_pembayaran' => $path,
                'persetujuan' => $request->persetujuan,
                'kategori' => $request->kategori,
                'uuid_reference' => $request->uuid,
            ]);


            // Simpan ke database atau tindakan lain
            return response()->json(['message' => 'Sukses', 'file_path' => $path]);
        }
        else{
            Verifikasi::create([
                'uuid' => (string) Uuid::uuid4(),
                'users_uuid' => Auth::user()->uuid,
                'persetujuan' => $request->persetujuan,
                'kategori' => $request->kategori,
                'uuid_reference' => $request->uuid,
            ]);


            // Simpan ke database atau tindakan lain
            return response()->json(['message' => 'Sukses']);

        }

        return response()->json(['message' => 'Tidak ada file yang dikirim'], 422);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.index')->with('success', 'Anda telah berhasil keluar');
    }
}
