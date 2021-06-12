<?php

namespace App\Http\Requests;

use App\Models\Produk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('produk_create');
    }

    public function rules()
    {
        return [
            'kode_produk' => [
                'string',
                'min:0',
                'max:15',
                'required',
                'unique:produks',
            ],
            'nama_produk' => [
                'string',
                'required',
            ],
        ];
    }
}
