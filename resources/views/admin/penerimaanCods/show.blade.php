@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penerimaanCod.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penerimaan-cods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penerimaanCod.fields.id') }}
                        </th>
                        <td>
                            {{ $penerimaanCod->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penerimaanCod.fields.kode_pcod') }}
                        </th>
                        <td>
                            {{ $penerimaanCod->kode_pcod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penerimaanCod.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $penerimaanCod->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penerimaanCod.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $penerimaanCod->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penerimaan-cods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection