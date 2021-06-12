<?php

namespace App\Http\Requests;

use App\Models\DetailTransaksi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDetailTransaksiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('detail_transaksi_edit');
    }

    public function rules()
    {
        return [
            'kode_transaksi_id' => [
                'required',
                'integer',
            ],
            'kode_produks.*' => [
                'integer',
            ],
            'kode_produks' => [
                'required',
                'array',
            ],
            'size' => [
                'string',
                'min:1',
                'max:3',
                'required',
            ],
            'warna' => [
                'string',
                'required',
            ],
            'jumlah' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'harga' => [
                'required',
            ],
            'kode_hpps.*' => [
                'integer',
            ],
            'kode_hpps' => [
                'required',
                'array',
            ],
        ];
    }
}
