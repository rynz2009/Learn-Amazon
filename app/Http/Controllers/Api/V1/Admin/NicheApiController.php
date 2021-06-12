<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNicheRequest;
use App\Http\Requests\UpdateNicheRequest;
use App\Http\Resources\Admin\NicheResource;
use App\Models\Niche;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NicheApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('niche_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NicheResource(Niche::all());
    }

    public function store(StoreNicheRequest $request)
    {
        $niche = Niche::create($request->all());

        return (new NicheResource($niche))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Niche $niche)
    {
        abort_if(Gate::denies('niche_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NicheResource($niche);
    }

    public function update(UpdateNicheRequest $request, Niche $niche)
    {
        $niche->update($request->all());

        return (new NicheResource($niche))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Niche $niche)
    {
        abort_if(Gate::denies('niche_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niche->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
