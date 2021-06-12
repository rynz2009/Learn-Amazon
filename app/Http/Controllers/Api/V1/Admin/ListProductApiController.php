<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreListProductRequest;
use App\Http\Requests\UpdateListProductRequest;
use App\Http\Resources\Admin\ListProductResource;
use App\Models\ListProduct;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('list_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListProductResource(ListProduct::with(['niches', 'created_by'])->get());
    }

    public function store(StoreListProductRequest $request)
    {
        $listProduct = ListProduct::create($request->all());
        $listProduct->niches()->sync($request->input('niches', []));
        if ($request->input('photo', false)) {
            $listProduct->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new ListProductResource($listProduct))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ListProduct $listProduct)
    {
        abort_if(Gate::denies('list_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListProductResource($listProduct->load(['niches', 'created_by']));
    }

    public function update(UpdateListProductRequest $request, ListProduct $listProduct)
    {
        $listProduct->update($request->all());
        $listProduct->niches()->sync($request->input('niches', []));
        if ($request->input('photo', false)) {
            if (!$listProduct->photo || $request->input('photo') !== $listProduct->photo->file_name) {
                if ($listProduct->photo) {
                    $listProduct->photo->delete();
                }
                $listProduct->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($listProduct->photo) {
            $listProduct->photo->delete();
        }

        return (new ListProductResource($listProduct))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ListProduct $listProduct)
    {
        abort_if(Gate::denies('list_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listProduct->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
