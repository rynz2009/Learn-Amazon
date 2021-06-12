<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNicheRequest;
use App\Http\Requests\StoreNicheRequest;
use App\Http\Requests\UpdateNicheRequest;
use App\Models\Niche;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NicheController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('niche_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niches = Niche::all();

        return view('admin.niches.index', compact('niches'));
    }

    public function create()
    {
        abort_if(Gate::denies('niche_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.niches.create');
    }

    public function store(StoreNicheRequest $request)
    {
        $niche = Niche::create($request->all());

        return redirect()->route('admin.niches.index');
    }

    public function edit(Niche $niche)
    {
        abort_if(Gate::denies('niche_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.niches.edit', compact('niche'));
    }

    public function update(UpdateNicheRequest $request, Niche $niche)
    {
        $niche->update($request->all());

        return redirect()->route('admin.niches.index');
    }

    public function show(Niche $niche)
    {
        abort_if(Gate::denies('niche_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.niches.show', compact('niche'));
    }

    public function destroy(Niche $niche)
    {
        abort_if(Gate::denies('niche_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niche->delete();

        return back();
    }

    public function massDestroy(MassDestroyNicheRequest $request)
    {
        Niche::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
