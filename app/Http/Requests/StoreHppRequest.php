<?php

namespace App\Http\Requests;

use App\Models\Hpp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHppRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hpp_create');
    }

    public function rules()
    {
        return [
            'kode_hpp' => [
                'string',
                'required',
                'unique:hpps',
            ],
            'nama' => [
                'string',
                'nullable',
            ],
        ];
    }
}
