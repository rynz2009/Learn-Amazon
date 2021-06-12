<?php

namespace App\Http\Requests;

use App\Models\TransaksiAff;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTransaksiAffRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transaksi_aff_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:transaksi_affs,id',
        ];
    }
}
