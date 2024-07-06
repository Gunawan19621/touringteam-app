<?php

namespace App\Http\Controllers;

use App\Models\T_Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class T_GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = T_Group::all();
        return view('pages.admin.group-touring.index', compact('groups'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'description' => '',
            'send_notif' => 'required',
            'distance' => '',
        ], [
            'name.required' => 'Nama Group harus diisi',
            'send_notif.required' => 'Send Notif harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'send_notif' => $request->send_notif,
                'distance' => $request->distance,
            ];

            T_Group::create($data);
            return response()->json(['success' => "Data berhasil ditambahkan"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = T_Group::find($id);
        return view('pages.admin.group-touring.detail-group-touring.index', compact('group'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = T_Group::find($id);
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'description' => '',
            'send_notif' => 'required',
            'distance' => '',
        ], [
            'name.required' => 'Nama Group harus diisi',
            'send_notif.required' => 'Send Notif harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'send_notif' => $request->send_notif,
                'distance' => $request->distance,
            ];

            T_Group::findOrFail($id)->update($data);
            return response()->json(['success' => "Data berhasil di Update"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $group = T_Group::findOrFail($id); // Menggunakan findOrFail untuk menangkap kesalahan jika data tidak ditemukan
            $group->delete();

            return response()->json(['success' => 'Data berhasil di hapus']);
        } catch (\Exception $e) {
            // Menangkap kesalahan dan mengembalikan pesan error
            return response()->json(['error' => 'Data gagal di hapus'], 500);
        }
    }
}
