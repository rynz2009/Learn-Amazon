<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTransaksiAffRequest;
use App\Http\Requests\StoreTransaksiAffRequest;
use App\Http\Requests\UpdateTransaksiAffRequest;
use App\Models\ListProduct;
use App\Models\TransaksiAff;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransaksiAffController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('transaksi_aff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiAffs = TransaksiAff::with(['kode_produk', 'created_by'])->get();

        return view('admin.transaksiAffs.index', compact('transaksiAffs'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaksi_aff_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_produks = ListProduct::all()->pluck('kode_produk', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transaksiAffs.create', compact('kode_produks'));
    }

    public function store(StoreTransaksiAffRequest $request)
    {
        $transaksiAff = TransaksiAff::create($request->all());

        return redirect()->route('admin.transaksi-affs.index');
    }

    public function edit(TransaksiAff $transaksiAff)
    {
        abort_if(Gate::denies('transaksi_aff_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_produks = ListProduct::all()->pluck('kode_produk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaksiAff->load('kode_produk', 'created_by');

        return view('admin.transaksiAffs.edit', compact('kode_produks', 'transaksiAff'));
    }

    public function update(UpdateTransaksiAffRequest $request, TransaksiAff $transaksiAff)
    {
        $transaksiAff->update($request->all());

        return redirect()->route('admin.transaksi-affs.index');
    }

    public function show(TransaksiAff $transaksiAff)
    {
        abort_if(Gate::denies('transaksi_aff_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiAff->load('kode_produk', 'created_by');

        return view('admin.transaksiAffs.show', compact('transaksiAff'));
    }

    public function destroy(TransaksiAff $transaksiAff)
    {
        abort_if(Gate::denies('transaksi_aff_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiAff->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransaksiAffRequest $request)
    {
        TransaksiAff::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
