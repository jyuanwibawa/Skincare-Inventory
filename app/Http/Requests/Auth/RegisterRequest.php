<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Menentukan apakah pengguna terotorisasi untuk membuat permintaan ini.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Mengizinkan permintaan ini untuk diproses
    }

    /**
     * Mendapatkan aturan validasi untuk permintaan ini.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'], // Validasi email unik pada tabel users
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Password harus minimal 8 karakter dan dikonfirmasi
        ];
    }

    /**
     * Menentukan pesan kesalahan yang dapat dikustomisasi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama lengkap harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}
