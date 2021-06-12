<?php

namespace App\Http\Requests;

use App\Models\CustomerService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_service_create');
    }

    public function rules()
    {
        return [
            'kode_cs' => [
                'string',
                'required',
                'unique:customer_services',
            ],
            'nama'    => [
                'string',
                'required',
            ],
            'no_wa'   => [
                'string',
                'nullable',
            ],
            'alamat'  => [
                'string',
                'nullable',
            ],
        ];
    }
}
