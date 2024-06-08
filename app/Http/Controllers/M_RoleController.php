<?php

namespace App\Http\Controllers;

use App\Models\M_Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class M_RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = M_Role::all();
        return view('pages.admin.managemen-user.role.index', compact('roles'));
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

        $role = new M_Role();
        $role->rolename = $request->input('rolename');
        $role->description = $request->input('description');
        $role->save();

        return response()->json(['success' => true, 'message' => 'Proses tambah data berhasil!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = M_Role::find($id);
        return response()->json($role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = M_Role::find($id);
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'rolename' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $role = M_Role::findOrFail($id);
        $role->update($validatedData);

        return response()->json($role);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = M_Role::find($id);
        $role->delete();
        return response()->json(['success' => 'Role deleted successfully']);
    }
}
