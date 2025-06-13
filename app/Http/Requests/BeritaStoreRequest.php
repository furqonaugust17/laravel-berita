<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaStoreRequest extends FormRequest
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
            'judul'   => 'required|string|min:10|max:255',
            'berita'  => 'required|string|min:10',
            'author'  => 'required|string|max:100',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required'   => 'Judul wajib diisi.',
            'judul.string'     => 'Judul harus berupa teks.',
            'judul.min'        => 'Judul minimal 10 karakter.',
            'judul.max'        => 'Judul maksimal 255 karakter.',

            'berita.required'  => 'Berita wajib diisi.',
            'berita.min'  => 'Berita minimal 10 karakter.',
            'berita.string'    => 'Berita harus berupa teks.',

            'author.required'  => 'Author wajib diisi.',
            'author.string'    => 'Author harus berupa teks.',
            'author.max'       => 'Author maksimal 100 karakter.',

            'gambar.required'     => 'File harus diupload.',
            'gambar.image'     => 'File harus berupa gambar.',
            'gambar.mimes'     => 'Gambar harus bertipe jpeg, png, jpg, gif, atau svg.',
            'gambar.max'       => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
