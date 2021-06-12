@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transaksi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.id') }}
                        </th>
                        <td>
                            {{ $transaksi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.kode_transaksi') }}
                        </th>
                        <td>
                            {{ $transaksi->kode_transaksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.kode_cs') }}
                        </th>
                        <td>
                            @foreach($transaksi->kode_cs as $key => $kode_cs)
                                <span class="label label-info">{{ $kode_cs->kode_cs }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $transaksi->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.nama') }}
                        </th>
                        <td>
                            {{ $transaksi->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.no_wa') }}
                        </th>
                        <td>
                            {{ $transaksi->no_wa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.alamat') }}
                        </th>
                        <td>
                            {{ $transaksi->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.propinsi') }}
                        </th>
                        <td>
                            {{ $transaksi->propinsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.kota') }}
                        </th>
                        <td>
                            {{ $transaksi->kota }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.kecamatan') }}
                        </th>
                        <td>
                            {{ $transaksi->kecamatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.ongkir') }}
                        </th>
                        <td>
                            {{ $transaksi->ongkir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.no_awb') }}
                        </th>
                        <td>
                            {{ $transaksi->no_awb }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Transaksi::STATUS_RADIO[$transaksi->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $transaksi->keterangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksi.fields.pembayaran') }}
                        </th>
                        <td>
                            {{ App\Models\Transaksi::PEMBAYARAN_RADIO[$transaksi->pembayaran] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksis.index') }}">
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
            <a class="nav-link" href="#kode_transaksi_detail_transaksis" role="tab" data-toggle="tab">
                {{ trans('cruds.detailTransaksi.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="kode_transaksi_detail_transaksis">
            @includeIf('admin.transaksis.relationships.kodeTransaksiDetailTransaksis', ['detailTransaksis' => $transaksi->kodeTransaksiDetailTransaksis])
        </div>
    </div>
</div>

@endsection