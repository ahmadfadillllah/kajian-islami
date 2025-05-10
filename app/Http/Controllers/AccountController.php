<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function index()
    {
        return view('account.index');
    }

    public function ubahPassword(Request $request, $uuid)
    {
        try {
            User::where('uuid', $uuid)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Password berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
