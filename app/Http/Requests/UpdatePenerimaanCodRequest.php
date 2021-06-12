<?php

namespace App\Http\Requests;

use App\Models\PenerimaanCod;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePenerimaanCodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('penerimaan_cod_edit');
    }

    public function rules()
    {
        return [
            'kode_pcod' => [
                'string',
                'required',
                'unique:penerimaan_cods,kode_pcod,' . request()->route('penerimaan_cod')->id,
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jumlah' => [
                'required',
            ],
        ];
    }
}
