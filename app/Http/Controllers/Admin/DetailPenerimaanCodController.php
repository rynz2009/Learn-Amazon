<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDetailPenerimaanCodRequest;
use App\Http\Requests\StoreDetailPenerimaanCodRequest;
use App\Http\Requests\UpdateDetailPenerimaanCodRequest;
use App\Models\DetailPenerimaanCod;
use App\Models\PenerimaanCod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailPenerimaanCodController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('detail_penerimaan_cod_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailPenerimaanCods = DetailPenerimaanCod::with(['kode_pcods'])->get();

        return view('admin.detailPenerimaanCods.index', compact('detailPenerimaanCods'));
    }

    public function create()
    {
        abort_if(Gate::denies('detail_penerimaan_cod_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_pcods = PenerimaanCod::all()->pluck('kode_pcod', 'id');

        return view('admin.detailPenerimaanCods.create', compact('kode_pcods'));
    }

    public function store(StoreDetailPenerimaanCodRequest $request)
    {
        $detailPenerimaanCod = DetailPenerimaanCod::create($request->all());
        $detailPenerimaanCod->kode_pcods()->sync($request->input('kode_pcods', []));

        return redirect()->route('admin.detail-penerimaan-cods.index');
    }

    public function edit(DetailPenerimaanCod $detailPenerimaanCod)
    {
        abort_if(Gate::denies('detail_penerimaan_cod_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_pcods = PenerimaanCod::all()->pluck('kode_pcod', 'id');

        $detailPenerimaanCod->load('kode_pcods');

        return view('admin.detailPenerimaanCods.edit', compact('kode_pcods', 'detailPenerimaanCod'));
    }

    public function update(UpdateDetailPenerimaanCodRequest $request, DetailPenerimaanCod $detailPenerimaanCod)
    {
        $detailPenerimaanCod->update($request->all());
        $detailPenerimaanCod->kode_pcods()->sync($request->input('kode_pcods', []));

        return redirect()->route('admin.detail-penerimaan-cods.index');
    }

    public function show(DetailPenerimaanCod $detailPenerimaanCod)
    {
        abort_if(Gate::denies('detail_penerimaan_cod_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailPenerimaanCod->load('kode_pcods');

        return view('admin.detailPenerimaanCods.show', compact('detailPenerimaanCod'));
    }

    public function destroy(DetailPenerimaanCod $detailPenerimaanCod)
    {
        abort_if(Gate::denies('detail_penerimaan_cod_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailPenerimaanCod->delete();

        return back();
    }

    public function massDestroy(MassDestroyDetailPenerimaanCodRequest $request)
    {
        DetailPenerimaanCod::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
