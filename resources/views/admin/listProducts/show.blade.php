@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.listProduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.list-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.id') }}
                        </th>
                        <td>
                            {{ $listProduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.kode_produk') }}
                        </th>
                        <td>
                            {{ $listProduct->kode_produk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.niche') }}
                        </th>
                        <td>
                            @foreach($listProduct->niches as $key => $niche)
                                <span class="label label-info">{{ $niche->niche }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.name') }}
                        </th>
                        <td>
                            {{ $listProduct->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.description') }}
                        </th>
                        <td>
                            {{ $listProduct->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.price') }}
                        </th>
                        <td>
                            {{ $listProduct->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.photo') }}
                        </th>
                        <td>
                            @if($listProduct->photo)
                                <a href="{{ $listProduct->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $listProduct->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.link_shopee') }}
                        </th>
                        <td>
                            {{ $listProduct->link_shopee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listProduct.fields.link_form') }}
                        </th>
                        <td>
                            {{ $listProduct->link_form }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.list-products.index') }}">
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
            <a class="nav-link" href="#kode_produk_transaksi_affs" role="tab" data-toggle="tab">
                {{ trans('cruds.transaksiAff.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="kode_produk_transaksi_affs">
            @includeIf('admin.listProducts.relationships.kodeProdukTransaksiAffs', ['transaksiAffs' => $listProduct->kodeProdukTransaksiAffs])
        </div>
    </div>
</div>

@endsection