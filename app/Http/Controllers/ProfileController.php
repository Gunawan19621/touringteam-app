<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\profile\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show()
    {
        // dd('oke');
        $user = Auth::user();
        // $qrCode = QrCode::size(200)->generate($user->kode);
        $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($user->kode);
        return view('profile.show', compact('user', 'qrCode'));
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
    public function update(ProfileUpdateRequest $request, string $id)
    {
        // dd($request->all());
        try {
            $user = User::findOrFail($id);

            // Update atribut user dengan data yang diterima dari request
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->no_phone = $request->no_phone;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
        }
    }

    public function uploadPhoto(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = User::findOrFail($id);

        // Hapus foto lama jika ada
        if ($user->profile_photo_path) {
            Storage::delete('public/' . $user->profile_photo_path);
        }

        // Simpan foto baru
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo_path = $path;
        $user->save();

        return redirect()->back()->with('success', 'Profile photo uploaded successfully');
    }

    public function deletePhoto($id)
    {
        $user = User::findOrFail($id);

        if ($user->profile_photo_path) {
            Storage::delete('public/' . $user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile photo deleted successfully');
    }

    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}