<?php

namespace App\Http\Requests;

use App\Models\DetailPenerimaanCod;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDetailPenerimaanCodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('detail_penerimaan_cod_edit');
    }

    public function rules()
    {
        return [
            'kode_pcods.*' => [
                'integer',
            ],
            'kode_pcods' => [
                'required',
                'array',
            ],
            'awb' => [
                'string',
                'required',
                'unique:detail_penerimaan_cods,awb,' . request()->route('detail_penerimaan_cod')->id,
            ],
            'nilai_awb' => [
                'required',
            ],
        ];
    }
}
