<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'nama' => [
                'string',
                'min:1',
                'max:100',
                'required',
            ],
            'no_wa' => [
                'string',
                'min:10',
                'max:12',
                'required',
            ],
            'alamat' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'no_rekening' => [
                'string',
                'min:0',
                'max:15',
                'nullable',
            ],
            'nama_bank' => [
                'string',
                'min:1',
                'max:11',
                'nullable',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
