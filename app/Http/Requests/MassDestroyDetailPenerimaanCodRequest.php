<?php

namespace App\Http\Requests;

use App\Models\DetailPenerimaanCod;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDetailPenerimaanCodRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('detail_penerimaan_cod_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:detail_penerimaan_cods,id',
        ];
    }
}
