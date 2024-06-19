<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class M_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin.managemen-user.m-user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('pages.admin.managemen-user.m-user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'no_phone' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username harus diisi',
            'fullname.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'no_phone.required' => 'Nomor telepon harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            // Generate random code with alphanumeric characters (6 characters long)
            $randomCode = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);

            $data = [
                'username' => $request->username,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'no_phone' => $request->no_phone,
                'password' => bcrypt($request->password),
                'kode' => $randomCode,
            ];

            User::create($data);
            return response()->json(['success' => "Data berhasil ditambahkan"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('pages.admin.managemen-user.m-user.show');
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email',
            'no_phone' => 'required',
            'gender' => 'nullable|in:male,female,others',
            'address' => 'nullable',
        ], [
            'fullname.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'no_phone.required' => 'Nomor telepon harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'no_phone' => $request->no_phone,
                'gender' => $request->gender,
                'address' => $request->address,
            ];

            User::findOrFail($id)->update($data);
            return response()->json(['success' => "Data berhasil di Update"]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id); // Menggunakan findOrFail untuk menangkap kesalahan jika data tidak ditemukan
            $user->delete();

            return response()->json(['success' => 'Data berhasil di hapus']);
        } catch (\Exception $e) {
            // Menangkap kesalahan dan mengembalikan pesan error
            return response()->json(['error' => 'Data gagal di hapus'], 500);
        }
    }
}