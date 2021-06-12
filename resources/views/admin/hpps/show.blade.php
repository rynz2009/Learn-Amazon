@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hpp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hpps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hpp.fields.id') }}
                        </th>
                        <td>
                            {{ $hpp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hpp.fields.kode_hpp') }}
                        </th>
                        <td>
                            {{ $hpp->kode_hpp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hpp.fields.nama') }}
                        </th>
                        <td>
                            {{ $hpp->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hpp.fields.harga') }}
                        </th>
                        <td>
                            {{ $hpp->harga }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hpps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#kode_hpp_detail_transaksis" role="tab" data-toggle="tab">
                {{ trans('cruds.detailTransaksi.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#kode_hpp_belanjas" role="tab" data-toggle="tab">
                {{ trans('cruds.belanja.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="kode_hpp_detail_transaksis">
            @includeIf('admin.hpps.relationships.kodeHppDetailTransaksis', ['detailTransaksis' => $hpp->kodeHppDetailTransaksis])
        </div>
        <div class="tab-pane" role="tabpanel" id="kode_hpp_belanjas">
            @includeIf('admin.hpps.relationships.kodeHppBelanjas', ['belanjas' => $hpp->kodeHppBelanjas])
        </div>
    </div>
</div>

@endsection