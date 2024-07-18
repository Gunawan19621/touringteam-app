<?php

namespace App\Http\Controllers;

use App\Models\M_Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class M_DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'documents' => M_Document::all(),
            'active' => 'documents',
        ];
        return view('pages.admin.reminder.document.index', $data);
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
            'expired' => 'required',
            'duration' => '',
            'duration_type' => '',
            'description' => '',
            'reminder' => '',
        ], [
            'name.required' => 'Nama Dokumen harus diisi',
            'expired.required' => 'Tanggal Kadaluarsa harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'expired' => $request->expired,
                'duration' => $request->duration,
                'duration_type' => $request->duration_type,
                'description' => $request->description,
                'reminder' => $request->reminder,
            ];

            M_Document::create($data);
            return response()->json(['success' => "Data berhasil ditambahkan"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = M_Document::find($id);
        return response()->json($document);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = M_Document::find($id);
        return response()->json($document);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'expired' => 'required',
            'duration' => '',
            'duration_type' => '',
            'description' => '',
            'reminder' => '',
        ], [
            'name.required' => 'Nama Dokumen harus diisi',
            'expired.required' => 'Tanggal Kadaluarsa harus diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'expired' => $request->expired,
                'duration' => $request->duration,
                'duration_type' => $request->duration_type,
                'description' => $request->description,
                'reminder' => $request->reminder,
            ];

            M_Document::findOrFail($id)->update($data);
            return response()->json(['success' => "Data berhasil di Update"]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $document = M_Document::findOrFail($id); // Menggunakan findOrFail untuk menangkap kesalahan jika data tidak ditemukan
            $document->delete();

            return response()->json(['success' => 'Data berhasil di hapus']);
        } catch (\Exception $e) {
            // Menangkap kesalahan dan mengembalikan pesan error
            return response()->json(['error' => 'Data gagal di hapus'], 500);
        }
    }
}
