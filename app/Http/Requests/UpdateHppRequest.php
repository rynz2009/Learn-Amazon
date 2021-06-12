<?php

namespace App\Http\Requests;

use App\Models\Hpp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHppRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hpp_edit');
    }

    public function rules()
    {
        return [
            'kode_hpp' => [
                'string',
                'required',
                'unique:hpps,kode_hpp,' . request()->route('hpp')->id,
            ],
            'nama' => [
                'string',
                'nullable',
            ],
        ];
    }
}
