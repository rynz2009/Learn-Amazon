<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiAffRequest;
use App\Http\Requests\UpdateTransaksiAffRequest;
use App\Http\Resources\Admin\TransaksiAffResource;
use App\Models\TransaksiAff;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransaksiAffApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaksi_aff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransaksiAffResource(TransaksiAff::with(['kode_produk', 'created_by'])->get());
    }

    public function store(StoreTransaksiAffRequest $request)
    {
        $transaksiAff = TransaksiAff::create($request->all());

        return (new TransaksiAffResource($transaksiAff))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TransaksiAff $transaksiAff)
    {
        abort_if(Gate::denies('transaksi_aff_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransaksiAffResource($transaksiAff->load(['kode_produk', 'created_by']));
    }

    public function update(UpdateTransaksiAffRequest $request, TransaksiAff $transaksiAff)
    {
        $transaksiAff->update($request->all());

        return (new TransaksiAffResource($transaksiAff))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TransaksiAff $transaksiAff)
    {
        abort_if(Gate::denies('transaksi_aff_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiAff->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
