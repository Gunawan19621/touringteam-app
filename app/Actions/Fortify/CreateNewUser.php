<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\M_User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
        try {
            // Validasi input
            $validatedData = Validator::make($input, [
                'username' => ['required', 'string', 'max:255', 'unique:m_users,username'],
                'fullname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:m_users,email'],
                'no_phone' => ['required', 'string', 'max:20'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'referral_code' => ['nullable', 'string', 'max:255'],
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ])->validate();

            // Generate unique code
            do {
                $kode = Str::random(6);
            } while (User::where('kode', $kode)->exists());

            // Buat pengguna baru
            return User::create([
                'username' => $validatedData['username'],
                'fullname' => $validatedData['fullname'],
                'email' => $validatedData['email'],
                'no_phone' => $validatedData['no_phone'],
                'password' => Hash::make($validatedData['password']),
                'kode' => $kode,
                'referral_code' => $validatedData['referral_code'],
            ]);
        } catch (ValidationException $e) {
            // Jika validasi gagal, lempar ValidationException
            throw $e;
        } catch (\Exception $e) {
            // Jika terjadi kesalahan lain, tangani di sini dan kembalikan pesan kesalahan
            return redirect()->back()->withInput()->withErrors(['register_error' => 'Terjadi kesalahan saat membuat akun. Silakan coba lagi.']);
        }
    }
}
