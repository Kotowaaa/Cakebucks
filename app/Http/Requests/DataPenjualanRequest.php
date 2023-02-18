<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPenjualanRequest extends FormRequest
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
            'jumlah_kue' => [
                'required', 'min:1'
            ],
            'tanggal' => [
                'required'
            ],
            'nominal_harga' => [
                'required'
            ],
        ];
        return $rules;
    }
}
