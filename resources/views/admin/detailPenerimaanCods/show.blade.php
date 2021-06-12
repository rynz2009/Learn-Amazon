@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.detailPenerimaanCod.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-penerimaan-cods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.id') }}
                        </th>
                        <td>
                            {{ $detailPenerimaanCod->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.kode_pcod') }}
                        </th>
                        <td>
                            @foreach($detailPenerimaanCod->kode_pcods as $key => $kode_pcod)
                                <span class="label label-info">{{ $kode_pcod->kode_pcod }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.awb') }}
                        </th>
                        <td>
                            {{ $detailPenerimaanCod->awb }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.nilai_awb') }}
                        </th>
                        <td>
                            {{ $detailPenerimaanCod->nilai_awb }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.detail-penerimaan-cods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection