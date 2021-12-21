<?php

namespace App\Http\Requests\KeuntunganAsuransi;

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
            'usia_min' => 'required|numeric',
            'premi' => 'required|numeric',
            'jumlah_pencairan' => 'required|numeric',
            'jenis_kelamin' => 'required|string|in:L,P',
        ];
    }
}
