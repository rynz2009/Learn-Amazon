@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.detailTransaksiAff.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-transaksi-affs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.id') }}
                        </th>
                        <td>
                            {{ $detailTransaksiAff->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.kode_transaksi') }}
                        </th>
                        <td>
                            {{ $detailTransaksiAff->kode_transaksi->kode_transaksi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $detailTransaksiAff->jumlah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.ukuran') }}
                        </th>
                        <td>
                            {{ $detailTransaksiAff->ukuran }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-transaksi-affs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection