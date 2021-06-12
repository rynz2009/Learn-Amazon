<?php

namespace App\Http\Requests;

use App\Models\Produk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('produk_edit');
    }

    public function rules()
    {
        return [
            'kode_produk' => [
                'string',
                'min:0',
                'max:15',
                'required',
                'unique:produks,kode_produk,' . request()->route('produk')->id,
            ],
            'nama_produk' => [
                'string',
                'required',
            ],
        ];
    }
}
