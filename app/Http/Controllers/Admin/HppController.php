<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHppRequest;
use App\Http\Requests\StoreHppRequest;
use App\Http\Requests\UpdateHppRequest;
use App\Models\Hpp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HppController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hpp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hpps = Hpp::all();

        return view('admin.hpps.index', compact('hpps'));
    }

    public function create()
    {
        abort_if(Gate::denies('hpp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hpps.create');
    }

    public function store(StoreHppRequest $request)
    {
        $hpp = Hpp::create($request->all());

        return redirect()->route('admin.hpps.index');
    }

    public function edit(Hpp $hpp)
    {
        abort_if(Gate::denies('hpp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hpps.edit', compact('hpp'));
    }

    public function update(UpdateHppRequest $request, Hpp $hpp)
    {
        $hpp->update($request->all());

        return redirect()->route('admin.hpps.index');
    }

    public function show(Hpp $hpp)
    {
        abort_if(Gate::denies('hpp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hpp->load('kodeHppDetailTransaksis', 'kodeHppBelanjas');

        return view('admin.hpps.show', compact('hpp'));
    }

    public function destroy(Hpp $hpp)
    {
        abort_if(Gate::denies('hpp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hpp->delete();

        return back();
    }

    public function massDestroy(MassDestroyHppRequest $request)
    {
        Hpp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
