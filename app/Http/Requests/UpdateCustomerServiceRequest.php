<?php

namespace App\Http\Requests;

use App\Models\CustomerService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_service_edit');
    }

    public function rules()
    {
        return [
            'kode_cs' => [
                'string',
                'required',
                'unique:customer_services,kode_cs,' . request()->route('customer_service')->id,
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
