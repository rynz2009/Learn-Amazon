<?php

namespace App\Http\Requests;

use App\Models\ListProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreListProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('list_product_create');
    }

    public function rules()
    {
        return [
            'kode_produk' => [
                'string',
                'min:0',
                'max:11',
                'required',
                'unique:list_products',
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
