<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerServiceRequest;
use App\Http\Requests\StoreCustomerServiceRequest;
use App\Http\Requests\UpdateCustomerServiceRequest;
use App\Models\CustomerService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerServiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerServices = CustomerService::all();

        return view('admin.customerServices.index', compact('customerServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerServices.create');
    }

    public function store(StoreCustomerServiceRequest $request)
    {
        $customerService = CustomerService::create($request->all());

        return redirect()->route('admin.customer-services.index');
    }

    public function edit(CustomerService $customerService)
    {
        abort_if(Gate::denies('customer_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerServices.edit', compact('customerService'));
    }

    public function update(UpdateCustomerServiceRequest $request, CustomerService $customerService)
    {
        $customerService->update($request->all());

        return redirect()->route('admin.customer-services.index');
    }

    public function show(CustomerService $customerService)
    {
        abort_if(Gate::denies('customer_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerServices.show', compact('customerService'));
    }

    public function destroy(CustomerService $customerService)
    {
        abort_if(Gate::denies('customer_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerService->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerServiceRequest $request)
    {
        CustomerService::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
