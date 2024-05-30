<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\M_User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */

    public function create(array $input): User
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'nophone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);
        // Generate unique code
        do {
            $kode = Str::random(6);
        } while (User::where('kode', $kode)->exists());

        return User::create([
            'username' => $input['username'],
            'fullname' => $input['fullname'],
            'email' => $input['email'],
            'nophone' => $input['nophone'],
            'password' => Hash::make($input['password']),
            'kode' => $kode,
        ]);
    }
}
