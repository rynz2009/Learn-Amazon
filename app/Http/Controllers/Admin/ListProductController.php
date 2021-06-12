<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyListProductRequest;
use App\Http\Requests\StoreListProductRequest;
use App\Http\Requests\UpdateListProductRequest;
use App\Models\ListProduct;
use App\Models\Niche;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ListProductController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('list_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listProducts = ListProduct::with(['niches', 'created_by', 'media'])->get();

        return view('admin.listProducts.index', compact('listProducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('list_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niches = Niche::all()->pluck('niche', 'id');

        return view('admin.listProducts.create', compact('niches'));
    }

    public function store(StoreListProductRequest $request)
    {
        $listProduct = ListProduct::create($request->all());
        $listProduct->niches()->sync($request->input('niches', []));
        if ($request->input('photo', false)) {
            $listProduct->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $listProduct->id]);
        }

        return redirect()->route('admin.list-products.index');
    }

    public function edit(ListProduct $listProduct)
    {
        abort_if(Gate::denies('list_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niches = Niche::all()->pluck('niche', 'id');

        $listProduct->load('niches', 'created_by');

        return view('admin.listProducts.edit', compact('niches', 'listProduct'));
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

        return redirect()->route('admin.list-products.index');
    }

    public function show(ListProduct $listProduct)
    {
        abort_if(Gate::denies('list_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listProduct->load('niches', 'created_by', 'kodeProdukTransaksiAffs');

        return view('admin.listProducts.show', compact('listProduct'));
    }

    public function destroy(ListProduct $listProduct)
    {
        abort_if(Gate::denies('list_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyListProductRequest $request)
    {
        ListProduct::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('list_product_create') && Gate::denies('list_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ListProduct();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
