@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.detailTransaksi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-transaksis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.id') }}
                        </th>
                        <td>
                            {{ $detailTransaksi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.kode_transaksi') }}
                        </th>
                        <td>
                            {{ $detailTransaksi->kode_transaksi->kode_transaksi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.kode_produk') }}
                        </th>
                        <td>
                            @foreach($detailTransaksi->kode_produks as $key => $kode_produk)
                                <span class="label label-info">{{ $kode_produk->kode_produk }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.desain') }}
                        </th>
                        <td>
                            @if($detailTransaksi->desain)
                                <a href="{{ $detailTransaksi->desain->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $detailTransaksi->desain->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.keterangan_desain') }}
                        </th>
                        <td>
                            {{ $detailTransaksi->keterangan_desain }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.size') }}
                        </th>
                        <td>
                            {{ $detailTransaksi->size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.warna') }}
                        </th>
                        <td>
                            {{ $detailTransaksi->warna }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $detailTransaksi->jumlah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.harga') }}
                        </th>
                        <td>
                            {{ $detailTransaksi->harga }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.kode_hpp') }}
                        </th>
                        <td>
                            @foreach($detailTransaksi->kode_hpps as $key => $kode_hpp)
                                <span class="label label-info">{{ $kode_hpp->kode_hpp }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-transaksis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection