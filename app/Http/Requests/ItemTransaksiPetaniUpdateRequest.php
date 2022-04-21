<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemTransaksiPetaniUpdateRequest extends FormRequest
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
            'panen_id' => ['required', 'exists:panens,id'],
            'transaksi_petani_id' => [
                'required',
                'exists:transaksi_petanis,id',
            ],
        ];
    }
}
