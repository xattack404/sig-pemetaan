<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LahanStoreRequest extends FormRequest
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
            'nama' => ['required', 'max:50', 'string'],
            'status_panen' => ['required', 'in:proses tanam,sudah panen'],
            'lattitude' => ['required', 'max:15', 'string'],
            'longitude' => ['required', 'max:15', 'string'],
            'jenis_tanamans_id' => ['required', 'exists:jenis_tanamans,id'],
        ];
    }
}
