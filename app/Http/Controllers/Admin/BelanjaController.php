<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBelanjaRequest;
use App\Http\Requests\StoreBelanjaRequest;
use App\Http\Requests\UpdateBelanjaRequest;
use App\Models\Belanja;
use App\Models\Hpp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BelanjaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('belanja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $belanjas = Belanja::with(['kode_hpps'])->get();

        return view('admin.belanjas.index', compact('belanjas'));
    }

    public function create()
    {
        abort_if(Gate::denies('belanja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_hpps = Hpp::all()->pluck('kode_hpp', 'id');

        return view('admin.belanjas.create', compact('kode_hpps'));
    }

    public function store(StoreBelanjaRequest $request)
    {
        $belanja = Belanja::create($request->all());
        $belanja->kode_hpps()->sync($request->input('kode_hpps', []));

        return redirect()->route('admin.belanjas.index');
    }

    public function edit(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_hpps = Hpp::all()->pluck('kode_hpp', 'id');

        $belanja->load('kode_hpps');

        return view('admin.belanjas.edit', compact('kode_hpps', 'belanja'));
    }

    public function update(UpdateBelanjaRequest $request, Belanja $belanja)
    {
        $belanja->update($request->all());
        $belanja->kode_hpps()->sync($request->input('kode_hpps', []));

        return redirect()->route('admin.belanjas.index');
    }

    public function show(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $belanja->load('kode_hpps');

        return view('admin.belanjas.show', compact('belanja'));
    }

    public function destroy(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $belanja->delete();

        return back();
    }

    public function massDestroy(MassDestroyBelanjaRequest $request)
    {
        Belanja::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
