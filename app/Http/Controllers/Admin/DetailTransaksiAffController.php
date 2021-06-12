<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDetailTransaksiAffRequest;
use App\Http\Requests\StoreDetailTransaksiAffRequest;
use App\Http\Requests\UpdateDetailTransaksiAffRequest;
use App\Models\DetailTransaksiAff;
use App\Models\TransaksiAff;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailTransaksiAffController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('detail_transaksi_aff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksiAffs = DetailTransaksiAff::with(['kode_transaksi', 'created_by'])->get();

        return view('admin.detailTransaksiAffs.index', compact('detailTransaksiAffs'));
    }

    public function create()
    {
        abort_if(Gate::denies('detail_transaksi_aff_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_transaksis = TransaksiAff::all()->pluck('kode_transaksi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.detailTransaksiAffs.create', compact('kode_transaksis'));
    }

    public function store(StoreDetailTransaksiAffRequest $request)
    {
        $detailTransaksiAff = DetailTransaksiAff::create($request->all());

        return redirect()->route('admin.detail-transaksi-affs.index');
    }

    public function edit(DetailTransaksiAff $detailTransaksiAff)
    {
        abort_if(Gate::denies('detail_transaksi_aff_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_transaksis = TransaksiAff::all()->pluck('kode_transaksi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $detailTransaksiAff->load('kode_transaksi', 'created_by');

        return view('admin.detailTransaksiAffs.edit', compact('kode_transaksis', 'detailTransaksiAff'));
    }

    public function update(UpdateDetailTransaksiAffRequest $request, DetailTransaksiAff $detailTransaksiAff)
    {
        $detailTransaksiAff->update($request->all());

        return redirect()->route('admin.detail-transaksi-affs.index');
    }

    public function show(DetailTransaksiAff $detailTransaksiAff)
    {
        abort_if(Gate::denies('detail_transaksi_aff_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksiAff->load('kode_transaksi', 'created_by');

        return view('admin.detailTransaksiAffs.show', compact('detailTransaksiAff'));
    }

    public function destroy(DetailTransaksiAff $detailTransaksiAff)
    {
        abort_if(Gate::denies('detail_transaksi_aff_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksiAff->delete();

        return back();
    }

    public function massDestroy(MassDestroyDetailTransaksiAffRequest $request)
    {
        DetailTransaksiAff::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
