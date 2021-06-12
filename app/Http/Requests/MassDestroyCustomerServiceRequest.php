<?php

namespace App\Http\Requests;

use App\Models\CustomerService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_services,id',
        ];
    }
}
