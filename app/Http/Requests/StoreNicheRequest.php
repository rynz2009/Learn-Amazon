<?php

namespace App\Http\Requests;

use App\Models\Niche;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNicheRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('niche_create');
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
