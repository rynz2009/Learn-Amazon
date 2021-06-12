@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.belanja.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.belanjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.id') }}
                        </th>
                        <td>
                            {{ $belanja->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $belanja->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.kode_hpp') }}
                        </th>
                        <td>
                            @foreach($belanja->kode_hpps as $key => $kode_hpp)
                                <span class="label label-info">{{ $kode_hpp->kode_hpp }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.nama_barang') }}
                        </th>
                        <td>
                            {{ $belanja->nama_barang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.jumlah_barang') }}
                        </th>
                        <td>
                            {{ $belanja->jumlah_barang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.harga') }}
                        </th>
                        <td>
                            {{ $belanja->harga }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $belanja->keterangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.sumber_bayar') }}
                        </th>
                        <td>
                            {{ App\Models\Belanja::SUMBER_BAYAR_RADIO[$belanja->sumber_bayar] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.type_belanja') }}
                        </th>
                        <td>
                            {{ App\Models\Belanja::TYPE_BELANJA_RADIO[$belanja->type_belanja] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.belanjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection