<?php

namespace App\Http\Requests;

use App\Models\Niche;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNicheRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('niche_edit');
    }

    public function rules()
    {
        return [
            'niche'     => [
                'string',
                'nullable',
            ],
            'deskripsi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
