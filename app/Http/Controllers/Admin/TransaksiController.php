<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTransaksiRequest;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\CustomerService;
use App\Models\Transaksi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransaksiController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('transaksi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksis = Transaksi::with(['kode_cs', 'created_by'])->get();

        return view('admin.transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaksi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_cs = CustomerService::all()->pluck('kode_cs', 'id');

        return view('admin.transaksis.create', compact('kode_cs'));
    }

    public function store(StoreTransaksiRequest $request)
    {
        $transaksi = Transaksi::create($request->all());
        $transaksi->kode_cs()->sync($request->input('kode_cs', []));

        return redirect()->route('admin.transaksis.index');
    }

    public function edit(Transaksi $transaksi)
    {
        abort_if(Gate::denies('transaksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_cs = CustomerService::all()->pluck('kode_cs', 'id');

        $transaksi->load('kode_cs', 'created_by');

        return view('admin.transaksis.edit', compact('kode_cs', 'transaksi'));
    }

    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());
        $transaksi->kode_cs()->sync($request->input('kode_cs', []));

        return redirect()->route('admin.transaksis.index');
    }

    public function show(Transaksi $transaksi)
    {
        abort_if(Gate::denies('transaksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksi->load('kode_cs', 'created_by', 'kodeTransaksiDetailTransaksis');

        return view('admin.transaksis.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksi)
    {
        abort_if(Gate::denies('transaksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksi->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransaksiRequest $request)
    {
        Transaksi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
