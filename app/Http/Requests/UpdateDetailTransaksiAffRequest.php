<?php

namespace App\Http\Requests;

use App\Models\DetailTransaksiAff;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDetailTransaksiAffRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('detail_transaksi_aff_edit');
    }

    public function rules()
    {
        return [
            'kode_transaksi_id' => [
                'required',
                'integer',
            ],
            'jumlah' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ukuran' => [
                'string',
                'min:1',
                'max:4',
                'required',
            ],
        ];
    }
}
