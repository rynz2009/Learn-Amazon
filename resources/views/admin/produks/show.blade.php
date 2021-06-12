@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.produk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.produks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.produk.fields.id') }}
                        </th>
                        <td>
                            {{ $produk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produk.fields.kode_produk') }}
                        </th>
                        <td>
                            {{ $produk->kode_produk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produk.fields.nama_produk') }}
                        </th>
                        <td>
                            {{ $produk->nama_produk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produk.fields.deskripsi') }}
                        </th>
                        <td>
                            {{ $produk->deskripsi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.produks.index') }}">
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
            <a class="nav-link" href="#kode_produk_detail_transaksis" role="tab" data-toggle="tab">
                {{ trans('cruds.detailTransaksi.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="kode_produk_detail_transaksis">
            @includeIf('admin.produks.relationships.kodeProdukDetailTransaksis', ['detailTransaksis' => $produk->kodeProdukDetailTransaksis])
        </div>
    </div>
</div>

@endsection