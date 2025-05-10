<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::where('id', '!=', '1')->get();

        return view('user.index', compact('user'));
    }

    public function insert(Request $request)
    {

        try {
            $request->validate([
                'username' => 'required|string|max:255|unique:users,username',
                'name' => 'required|string|max:255',
                'role' => 'required|string',
            ]);

            User::create([
                'uuid' => (string) Uuid::uuid4(),
                'username' => $request->username,
                'name' => $request->name,
                'role' => $request->role,
                'password' => Hash::make('123456'),
            ]);

            return redirect()->route('user.index')->with('success', 'Berhasil menambahkan User');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('info', $th->getMessage());
        }

    }

    public function statusEnabled($uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        try {
            if($data->statusenabled == false){
                User::where('uuid', $data->uuid)->update(['statusenabled' => true]);
                return redirect()->back()->with('success', 'User berhasil diupdate');
            }else{
                User::where('uuid', $data->uuid)->update(['statusenabled' => false]);
                return redirect()->back()->with('success', 'User berhasil diupdate');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'User gagal diupdate');
        }
    }

    public function resetPassword($uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        try {
            User::where('uuid', $data->uuid)->update(['password' => Hash::make('123456')]);
            return redirect()->back()->with('success', 'Password User berhasil diupdate');
            //code...
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Password User gagal diupdate');
        }
    }
}
