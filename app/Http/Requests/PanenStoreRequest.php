<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanenStoreRequest extends FormRequest
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
            'stok' => ['required', 'max:3', 'string'],
            'harga' => ['required', 'max:7', 'string'],
            'lahan_id' => ['required', 'exists:lahans,id'],
        ];
    }
}
