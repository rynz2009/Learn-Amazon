<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetailTransaksiAffRequest;
use App\Http\Requests\UpdateDetailTransaksiAffRequest;
use App\Http\Resources\Admin\DetailTransaksiAffResource;
use App\Models\DetailTransaksiAff;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailTransaksiAffApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('detail_transaksi_aff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DetailTransaksiAffResource(DetailTransaksiAff::with(['kode_transaksi', 'created_by'])->get());
    }

    public function store(StoreDetailTransaksiAffRequest $request)
    {
        $detailTransaksiAff = DetailTransaksiAff::create($request->all());

        return (new DetailTransaksiAffResource($detailTransaksiAff))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DetailTransaksiAff $detailTransaksiAff)
    {
        abort_if(Gate::denies('detail_transaksi_aff_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DetailTransaksiAffResource($detailTransaksiAff->load(['kode_transaksi', 'created_by']));
    }

    public function update(UpdateDetailTransaksiAffRequest $request, DetailTransaksiAff $detailTransaksiAff)
    {
        $detailTransaksiAff->update($request->all());

        return (new DetailTransaksiAffResource($detailTransaksiAff))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DetailTransaksiAff $detailTransaksiAff)
    {
        abort_if(Gate::denies('detail_transaksi_aff_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksiAff->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
