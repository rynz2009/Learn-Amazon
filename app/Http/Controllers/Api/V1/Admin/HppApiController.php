<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHppRequest;
use App\Http\Requests\UpdateHppRequest;
use App\Http\Resources\Admin\HppResource;
use App\Models\Hpp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HppApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hpp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HppResource(Hpp::all());
    }

    public function store(StoreHppRequest $request)
    {
        $hpp = Hpp::create($request->all());

        return (new HppResource($hpp))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hpp $hpp)
    {
        abort_if(Gate::denies('hpp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HppResource($hpp);
    }

    public function update(UpdateHppRequest $request, Hpp $hpp)
    {
        $hpp->update($request->all());

        return (new HppResource($hpp))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hpp $hpp)
    {
        abort_if(Gate::denies('hpp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hpp->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
