<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditKueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nama_kue' => [
                'required', 'string', 'max:255'
            ],
            'stok_kue' => [
                'required', 'string', 'max:100'
            ],
            'jenis_kue' => [
                'required'
            ],
            'tanggal_expired' => [
                'required'
            ],
            'harga_kue' => [
                'required'
            ],
            'gambar_kue' => [
                'mimes:jpg,jpeg,png'
            ],
            'deskripsi_kue' => [
                'required', 'max:900'
            ],
        ];
        return $rules;
    }
}
