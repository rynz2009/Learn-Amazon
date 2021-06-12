<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProdukRequest;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Produk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdukController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produks = Produk::all();

        return view('admin.produks.index', compact('produks'));
    }

    public function create()
    {
        abort_if(Gate::denies('produk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.produks.create');
    }

    public function store(StoreProdukRequest $request)
    {
        $produk = Produk::create($request->all());

        return redirect()->route('admin.produks.index');
    }

    public function edit(Produk $produk)
    {
        abort_if(Gate::denies('produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.produks.edit', compact('produk'));
    }

    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update($request->all());

        return redirect()->route('admin.produks.index');
    }

    public function show(Produk $produk)
    {
        abort_if(Gate::denies('produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produk->load('kodeProdukDetailTransaksis');

        return view('admin.produks.show', compact('produk'));
    }

    public function destroy(Produk $produk)
    {
        abort_if(Gate::denies('produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produk->delete();

        return back();
    }

    public function massDestroy(MassDestroyProdukRequest $request)
    {
        Produk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
