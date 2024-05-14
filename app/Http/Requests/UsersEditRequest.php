<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'age' => 'required|numeric',
            'birth' => 'required',
            'address' => 'required|string|max:1000',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'name.string' => 'Kolom nama harus berupa string.',
            'name.max' => 'Kolom nama maksimal 255 karakter.',
            'gender.required' => 'Kolom gender harus diisi.',
            'gender.in' => 'Gender yang diisi tidak valid',
            'age.required' => 'Kolom umur harus diisi.',
            'age.numeric' => 'Kolom umur harus berupa angka.',
            'birth.required' => 'Kolom berat harus diisi.',
            'address.required' => 'Kolom alamat harus diisi.',
            'address.string' => 'Kolom alamat harus berupa string.',
            'address.max' => 'Alamat tidak boleh lebih dari 1000 karakter.',
        ];
    }
}