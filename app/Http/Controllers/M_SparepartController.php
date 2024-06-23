<?php

namespace App\Http\Controllers;

use App\Models\M_Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class M_SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sparepart = M_Sparepart::all();
        return view('pages.admin.reminder.sparepart.index', compact('sparepart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'est_price' => '',
            'duration' => '',
            'duration_type' => '',
            'reminder' => 'required',
            'last_service' => '',
            'description' => '',
        ], [
            'name.required' => 'Nama Sparepart harus diisi',
            'status_reminder.required' => 'Status Reminder harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'est_price' => $request->est_price,
                'duration' => $request->duration,
                'duration_type' => $request->duration_type,
                'reminder' => $request->reminder,
                'last_service' => $request->last_service,
                'description' => $request->description,
            ];

            M_Sparepart::create($data);
            return response()->json(['success' => "Data berhasil ditambahkan"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sparepart = M_Sparepart::find($id);
        return response()->json($sparepart);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sparepart = M_Sparepart::find($id);
        return response()->json($sparepart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'est_price' => '',
            'duration' => '',
            'duration_type' => '',
            'reminder' => 'required',
            'last_service' => '',
            'description' => '',
        ], [
            'name.required' => 'Nama Sparepart harus diisi',
            'status_reminder.required' => 'Status Reminder harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'est_price' => $request->est_price,
                'duration' => $request->duration,
                'duration_type' => $request->duration_type,
                'reminder' => $request->reminder,
                'last_service' => $request->last_service,
                'description' => $request->description,
            ];

            M_Sparepart::findOrFail($id)->update($data);
            return response()->json(['success' => "Data berhasil di Update"]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $sparepart = M_Sparepart::findOrFail($id); // Menggunakan findOrFail untuk menangkap kesalahan jika data tidak ditemukan
            $sparepart->delete();

            return response()->json(['success' => 'Data berhasil di hapus']);
        } catch (\Exception $e) {
            // Menangkap kesalahan dan mengembalikan pesan error
            return response()->json(['error' => 'Data gagal di hapus'], 500);
        }
    }
}
