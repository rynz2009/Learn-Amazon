<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerServiceRequest;
use App\Http\Requests\UpdateCustomerServiceRequest;
use App\Http\Resources\Admin\CustomerServiceResource;
use App\Models\CustomerService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerServiceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerServiceResource(CustomerService::all());
    }

    public function store(StoreCustomerServiceRequest $request)
    {
        $customerService = CustomerService::create($request->all());

        return (new CustomerServiceResource($customerService))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerService $customerService)
    {
        abort_if(Gate::denies('customer_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerServiceResource($customerService);
    }

    public function update(UpdateCustomerServiceRequest $request, CustomerService $customerService)
    {
        $customerService->update($request->all());

        return (new CustomerServiceResource($customerService))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerService $customerService)
    {
        abort_if(Gate::denies('customer_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerService->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
