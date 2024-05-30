<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:m_users,email,' . $this->user()->id,
            'nophone' => 'required|string|max:255|unique:m_users,nophone,' . $this->user()->id,
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => 'Nama wajib diisi.',
            'fullname.string' => 'Nama harus berupa teks.',
            'fullname.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'nophone.required' => 'Nomor telepon wajib diisi.',
            'nophone.string' => 'Nomor telepon harus berupa teks.',
            'nophone.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'nophone.unique' => 'Nomor telepon sudah digunakan.',
            'address.string' => 'Alamat harus berupa teks.',
            'address.max' => 'Alamat tidak boleh lebih dari :max karakter.',
            'gender.in' => 'Pilihan gender tidak valid.',
            'profile_photo.image' => 'Foto profil harus berupa gambar.',
            'profile_photo.mimes' => 'Format gambar yang diterima adalah: jpg, jpeg, png, gif.',
            'profile_photo.max' => 'Ukuran gambar tidak boleh lebih dari :max kilobita.',
        ];
    }
}
