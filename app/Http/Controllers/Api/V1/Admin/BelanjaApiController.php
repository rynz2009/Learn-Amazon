<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBelanjaRequest;
use App\Http\Requests\UpdateBelanjaRequest;
use App\Http\Resources\Admin\BelanjaResource;
use App\Models\Belanja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BelanjaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('belanja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BelanjaResource(Belanja::with(['kode_hpps'])->get());
    }

    public function store(StoreBelanjaRequest $request)
    {
        $belanja = Belanja::create($request->all());
        $belanja->kode_hpps()->sync($request->input('kode_hpps', []));

        return (new BelanjaResource($belanja))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BelanjaResource($belanja->load(['kode_hpps']));
    }

    public function update(UpdateBelanjaRequest $request, Belanja $belanja)
    {
        $belanja->update($request->all());
        $belanja->kode_hpps()->sync($request->input('kode_hpps', []));

        return (new BelanjaResource($belanja))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $belanja->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
