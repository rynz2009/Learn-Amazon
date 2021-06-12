<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPenerimaanCodRequest;
use App\Http\Requests\StorePenerimaanCodRequest;
use App\Http\Requests\UpdatePenerimaanCodRequest;
use App\Models\PenerimaanCod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenerimaanCodController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('penerimaan_cod_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penerimaanCods = PenerimaanCod::all();

        return view('admin.penerimaanCods.index', compact('penerimaanCods'));
    }

    public function create()
    {
        abort_if(Gate::denies('penerimaan_cod_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penerimaanCods.create');
    }

    public function store(StorePenerimaanCodRequest $request)
    {
        $penerimaanCod = PenerimaanCod::create($request->all());

        return redirect()->route('admin.penerimaan-cods.index');
    }

    public function edit(PenerimaanCod $penerimaanCod)
    {
        abort_if(Gate::denies('penerimaan_cod_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penerimaanCods.edit', compact('penerimaanCod'));
    }

    public function update(UpdatePenerimaanCodRequest $request, PenerimaanCod $penerimaanCod)
    {
        $penerimaanCod->update($request->all());

        return redirect()->route('admin.penerimaan-cods.index');
    }

    public function show(PenerimaanCod $penerimaanCod)
    {
        abort_if(Gate::denies('penerimaan_cod_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penerimaanCods.show', compact('penerimaanCod'));
    }

    public function destroy(PenerimaanCod $penerimaanCod)
    {
        abort_if(Gate::denies('penerimaan_cod_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penerimaanCod->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenerimaanCodRequest $request)
    {
        PenerimaanCod::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
