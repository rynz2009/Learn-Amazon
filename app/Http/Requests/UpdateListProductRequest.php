<?php

namespace App\Http\Requests;

use App\Models\ListProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateListProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('list_product_edit');
    }

    public function rules()
    {
        return [
            'kode_produk' => [
                'string',
                'min:0',
                'max:11',
                'required',
                'unique:list_products,kode_produk,' . request()->route('list_product')->id,
            ],
            'niches.*' => [
                'integer',
            ],
            'niches' => [
                'required',
                'array',
            ],
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
            ],
            'link_shopee' => [
                'string',
                'nullable',
            ],
            'link_form' => [
                'string',
                'nullable',
            ],
        ];
    }
}
