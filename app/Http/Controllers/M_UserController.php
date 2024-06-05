<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('pages.admin.managemen-user.m-user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Generate random code with alphanumeric characters (6 characters long)
    //     $randomCode = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);

    //     $user = new User();
    //     $user->username = $request->input('username');
    //     $user->fullname = $request->input('fullname');
    //     $user->email = $request->input('email');
    //     $user->no_phone = $request->input('no_phone');
    //     $user->password = bcrypt($request->input('password')); // Remember to hash the password
    //     $user->kode = $randomCode; // Assign the random code
    //     $user->save();

    //     return response()->json($user);
    // }
    public function store(Request $request)
    {
        // Generate random code with alphanumeric characters (6 characters long)
        $randomCode = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);

        $user = new User();
        $user->username = $request->input('username');
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->no_phone = $request->input('no_phone');
        $user->password = bcrypt($request->input('password')); // Remember to hash the password
        $user->kode = $randomCode; // Assign the random code
        $user->save();

        return response()->json(['success' => true, 'message' => 'Proses tambah data berhasil!']);
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
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_phone' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others',
            'address' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return response()->json($user);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }
}