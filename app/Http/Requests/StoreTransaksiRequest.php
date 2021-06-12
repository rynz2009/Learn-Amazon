<?php

namespace App\Http\Requests;

use App\Models\Transaksi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransaksiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaksi_create');
    }

    public function rules()
    {
        return [
            'kode_transaksi' => [
                'string',
                'min:5',
                'max:10',
                'required',
                'unique:transaksis',
            ],
            'kode_cs.*' => [
                'integer',
            ],
            'kode_cs' => [
                'required',
                'array',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'nama' => [
                'string',
                'required',
            ],
            'no_wa' => [
                'string',
                'min:10',
                'max:14',
                'required',
            ],
            'alamat' => [
                'required',
            ],
            'propinsi' => [
                'string',
                'nullable',
            ],
            'kota' => [
                'string',
                'nullable',
            ],
            'kecamatan' => [
                'string',
                'nullable',
            ],
            'no_awb' => [
                'string',
                'nullable',
            ],
            'status' => [
                'required',
            ],
            'pembayaran' => [
                'required',
            ],
        ];
    }
}
