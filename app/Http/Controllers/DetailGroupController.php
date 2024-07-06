<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\T_Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Ambil data group
        $group = T_Group::find($id);

        // Ambil data group members
        $group_members = GroupMember::where('group_id', $id)->get();

        // Ambil data user berdasarkan user_id dari group_members
        $group_members->each(function ($member) {
            $member->user = User::find($member->user_id);
        });

        $data = [
            'group' => $group,
            'group_members' => $group_members,
        ];
        return view('pages.admin.group-touring.detail-group-touring.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = T_Group::find($id);

        // Ambil data group members
        $group_members = GroupMember::where('group_id', $id)->get();

        // Ambil data user berdasarkan user_id dari group_members
        $group_members->each(function ($member) {
            $member->user = User::find($member->user_id);
        });
        return view('pages.admin.group-touring.detail-group-touring.index', compact('group', 'group_members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
