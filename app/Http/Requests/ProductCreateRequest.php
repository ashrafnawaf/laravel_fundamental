<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kondisi' => 'required|in:Baru,Bekas',
            'deskripsi' => 'required|string|max:2000',
        ];
    }
    public function messages(): array
    {
        return [
            'nama.required' => 'Kolom nama harus diisi.',
            'nama.string' => 'Kolom nama harus berupa string.',
            'nama.max' => 'Kolom nama maksimal 255 karakter.',
            'harga.required' => 'Kolom harga harus diisi.',
            'harga.numeric' => 'Kolom harga harus berupa angka.',
            'stok.required' => 'Kolom stok harus diisi.',
            'stok.numeric' => 'Kolom stok harus berupa angka.',
            'berat.required' => 'Kolom berat harus diisi.',
            'berat.numeric' => 'Kolom berat harus berupa angka.',
            'gambar.required' => 'Kolom gambar harus diisi.',
            'gambar.image' => 'The image must be an image.',
            'gambar.mimes' => 'Kolom gambar harus berupa file gambar dengan format: jpeg, png, jpg.',
            'gambar.max' => 'The image must not be greater than 2048 kilobytes.',
            'kondisi.required' => 'Kolom kondisi harus diisi.',
            'kondisi.in' => 'The selected kondisi is invalid.',
            'deskripsi.required' => 'Kolom deskripsi harus diisi.',
            'deskripsi.string' => 'Kolom deskripsi harus berupa string.',
            'deskripsi.max' => 'The deskripsi must not be greater than 2000 characters.',
        ];
    }
}