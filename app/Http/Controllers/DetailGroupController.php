<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\T_Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailGroupController extends Controller
{
    //Update Detail Group
    public function updateDetailGroup(Request $request, string $id)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => '',
            ],
            [
                'name.required' => 'Nama harus diisi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            T_Group::findOrFail($id)->update($data);
            return response()->json(['success' => "Data berhasil di Update"]);
        }
    }

    // update status anggota grup
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validasi = Validator::make(
            $request->all(),
            [
                'status_lead' => 'required|in:true,false',
            ],
            [
                'status_lead.required' => 'Status Lead harus diisi',
                'status_lead.in' => 'Status Lead harus berisi true atau false',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['error' => 'Validasi gagal.']);
        }

        // Temukan anggota grup berdasarkan ID
        $groupMember = GroupMember::findOrFail($id);

        // Perbarui nilai status_lead
        $groupMember->status_lead = $request->input('status_lead');
        $groupMember->save();

        return response()->json(['success' => 'Status berhasil diperbarui.']);
    }
}
