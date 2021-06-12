<?php

namespace App\Http\Requests;

use App\Models\TransaksiAff;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransaksiAffRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaksi_aff_create');
    }

    public function rules()
    {
        return [
            'kode_transaksi' => [
                'string',
                'min:5',
                'max:10',
                'required',
                'unique:transaksi_affs',
            ],
            'kode_produk_id' => [
                'required',
                'integer',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'nama' => [
                'string',
                'required',
            ],
            'alamat' => [
                'required',
            ],
            'kota' => [
                'string',
                'required',
            ],
            'propinsi' => [
                'string',
                'required',
            ],
            'no_wa' => [
                'string',
                'min:10',
                'max:14',
                'required',
            ],
            'jumlah' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'no_awb' => [
                'string',
                'nullable',
            ],
        ];
    }
}
