<?php

namespace App\Http\Controllers;

use App\Models\GroupArea;
use App\Models\User;
use App\Models\T_Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class T_GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'groups' => T_Group::where('status', 'active')->get(),
            'active' => 'groups',
        ];
        return view('pages.admin.group-touring.index', $data);
    }

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
            'status' => '',
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
                'status' => 'active',
            ];

            T_Group::create($data);
            return response()->json(['success' => "Data berhasil ditambahkan"]);
        }
    }

    /**
     * detail group dan tab anggota
     */
    public function show(string $id)
    {
        $data = [
            'group' => T_Group::findOrFail($id),
            'active' => 'groups',
        ];
        return view('pages.admin.group-touring.detail-group-touring.index', $data);
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
        // dd($request->all());
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
            $group = T_Group::findOrFail($id);
            $group->delete();

            return response()->json(['success' => 'Data berhasil di hapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data gagal di hapus'], 500);
        }
    }

    //tab anggota
    public function anggota($id)
    {
        $group = T_Group::find($id);

        $group_members = GroupMember::where('group_id', $id)->get();

        $group_members->each(function ($member) {
            $member->user = User::find($member->user_id);
        });

        $data = [
            'group' => $group,
            'group_members' => $group_members,
            'active' => 'groups',
        ];
        return view('pages.admin.group-touring.detail-group-touring.anggota-group', $data);
    }

    //tab area
    public function area($id)
    {
        $group = T_Group::find($id);

        $groupArea = GroupArea::where('group_id', $id)->get();

        $groupArea->each(function ($member) {
            $member->user = User::find($member->user_id);
        });
        $data = [
            'group' => $group,
            'area' => $groupArea,
            'active' => 'groups',
        ];
        return view('pages.admin.group-touring.detail-group-touring.area', $data);
    }

    // tambah titik area
    public function storeArea(Request $request)
    {
        // dd('oke');
        // dd($request->all()); // Debug: Periksa semua data request

        $validasi = Validator::make(
            $request->all(),
            [
                'group_id' => 'required',
                'type' => 'required',
                'name' => 'required',
                'area' => 'required',
                'sort' => '',
            ],
            [
                'group_id.required' => 'Group ID harus diisi',
                'type.required' => 'Type harus diisi',
                'name.required' => 'Name harus diisi',
                'area.required' => 'Area harus diisi',
            ]
        );

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'group_id' => $request->group_id,
                'type' => $request->type,
                'name' => $request->name,
                'area' => $request->area,
                'sort' => $request->sort,
            ];
            GroupArea::create($data);
            return response()->json(['success' => "Data berhasil di Update"]);
        }
    }

    //tab pengaturan
    public function pengaturan($id)
    {
        $data = [
            'group' => T_Group::findOrFail($id),
            'active' => 'groups',
        ];
        return view('pages.admin.group-touring.detail-group-touring.pengaturan-group', $data);
    }
}
