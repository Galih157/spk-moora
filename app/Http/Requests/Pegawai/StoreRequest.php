<?php

namespace App\Http\Requests\Pegawai;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'nama' => 'required|string|max:255',
            'usia' => 'required|numeric',
            'jenis_kelamin' => 'required|string|in:L,P',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|numeric',
            'alamat' => 'nullable|string'
        ];
    }
}
