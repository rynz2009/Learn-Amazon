@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerService.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerService.fields.id') }}
                        </th>
                        <td>
                            {{ $customerService->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerService.fields.kode_cs') }}
                        </th>
                        <td>
                            {{ $customerService->kode_cs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerService.fields.nama') }}
                        </th>
                        <td>
                            {{ $customerService->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerService.fields.no_wa') }}
                        </th>
                        <td>
                            {{ $customerService->no_wa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerService.fields.alamat') }}
                        </th>
                        <td>
                            {{ $customerService->alamat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection