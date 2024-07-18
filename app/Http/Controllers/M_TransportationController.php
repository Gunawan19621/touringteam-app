<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Transportation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class M_TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'transportation' => M_Transportation::all(),
            'active' => 'transportation',

        ];
        // $transportation = M_Transportation::all();
        return view('pages.admin.transportation.index', $data);
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
            'type' => 'required',
            'name' => 'required',
            'machine' => '',
            'thn_beli' => '',
            'thn_rakit' => '',
            'plat_no' => '',
            'foto_kendaraan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => '',
        ], [
            'type.required' => 'Tipe Kendaraan harus diisi',
            'name.required' => 'Nama Kendaraan harus diisi',
            'foto_kendaraan.image' => 'Foto kendaraan harus berupa gambar',
            'foto_kendaraan.mimes' => 'Foto kendaraan harus dalam format jpeg, png, jpg, gif, atau svg',
            'foto_kendaraan.max' => 'Ukuran foto kendaraan maksimal 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'type' => $request->type,
                'name' => $request->name,
                'machine' => $request->machine,
                'thn_beli' => $request->thn_beli,
                'thn_rakit' => $request->thn_rakit,
                'plat_no' => $request->plat_no,
                'description' => $request->description,
            ];

            if ($request->hasFile('foto_kendaraan')) {
                $file = $request->file('foto_kendaraan');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/kendaraan'), $filename);
                $data['foto_kendaraan'] = $filename;
            }

            M_Transportation::create($data);
            return response()->json(['success' => "Data berhasil ditambahkan"]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transportation = M_Transportation::find($id);
        return response()->json($transportation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transportation = M_Transportation::find($id);
        return response()->json($transportation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'type' => 'required',
            'name' => 'required',
            'machine' => '',
            'thn_beli' => '',
            'thn_rakit' => '',
            'plat_no' => '',
            'foto_kendaraan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => '',
        ], [
            'type.required' => 'Tipe Kendaraan harus diisi',
            'name.required' => 'Nama Kendaraan harus diisi',
            'foto_kendaraan.image' => 'Foto kendaraan harus berupa gambar',
            'foto_kendaraan.mimes' => 'Foto kendaraan harus dalam format jpeg, png, jpg, gif, atau svg',
            'foto_kendaraan.max' => 'Ukuran foto kendaraan maksimal 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'type' => $request->type,
                'name' => $request->name,
                'machine' => $request->machine,
                'thn_beli' => $request->thn_beli,
                'thn_rakit' => $request->thn_rakit,
                'plat_no' => $request->plat_no,
                'description' => $request->description,
            ];

            if ($request->hasFile('foto_kendaraan')) {
                $file = $request->file('foto_kendaraan');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/kendaraan'), $filename);
                $data['foto_kendaraan'] = $filename;

                // Delete the old photo if exists
                $oldPhoto = M_Transportation::find($id)->foto_kendaraan;
                if ($oldPhoto && file_exists(public_path('uploads/kendaraan/' . $oldPhoto))) {
                    unlink(public_path('uploads/kendaraan/' . $oldPhoto));
                }
            }

            M_Transportation::where('id', $id)->update($data);
            return response()->json(['success' => "Data berhasil di Update"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $transportation = M_Transportation::findOrFail($id); // Menggunakan findOrFail untuk menangkap kesalahan jika data tidak ditemukan
            $transportation->delete();

            return response()->json(['success' => 'Data berhasil di hapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data gagal di hapus'], 500);
        }
    }
}
