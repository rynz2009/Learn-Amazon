<?php

namespace App\Http\Requests;

use App\Models\Belanja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBelanjaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('belanja_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'kode_hpps.*' => [
                'integer',
            ],
            'kode_hpps' => [
                'array',
            ],
            'nama_barang' => [
                'string',
                'required',
            ],
            'jumlah_barang' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'harga' => [
                'required',
            ],
            'sumber_bayar' => [
                'required',
            ],
            'type_belanja' => [
                'required',
            ],
        ];
    }
}
