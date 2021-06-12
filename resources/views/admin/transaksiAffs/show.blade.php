@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transaksiAff.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksi-affs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.id') }}
                        </th>
                        <td>
                            {{ $transaksiAff->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.kode_transaksi') }}
                        </th>
                        <td>
                            {{ $transaksiAff->kode_transaksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.kode_produk') }}
                        </th>
                        <td>
                            {{ $transaksiAff->kode_produk->kode_produk ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $transaksiAff->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.nama') }}
                        </th>
                        <td>
                            {{ $transaksiAff->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.alamat') }}
                        </th>
                        <td>
                            {{ $transaksiAff->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.kota') }}
                        </th>
                        <td>
                            {{ $transaksiAff->kota }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.propinsi') }}
                        </th>
                        <td>
                            {{ $transaksiAff->propinsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.no_wa') }}
                        </th>
                        <td>
                            {{ $transaksiAff->no_wa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $transaksiAff->jumlah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.total_harga') }}
                        </th>
                        <td>
                            {{ $transaksiAff->total_harga }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.ongkir') }}
                        </th>
                        <td>
                            {{ $transaksiAff->ongkir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.grand_total') }}
                        </th>
                        <td>
                            {{ $transaksiAff->grand_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.no_awb') }}
                        </th>
                        <td>
                            {{ $transaksiAff->no_awb }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\TransaksiAff::STATUS_RADIO[$transaksiAff->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.pembayaran') }}
                        </th>
                        <td>
                            {{ App\Models\TransaksiAff::PEMBAYARAN_RADIO[$transaksiAff->pembayaran] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksi-affs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection