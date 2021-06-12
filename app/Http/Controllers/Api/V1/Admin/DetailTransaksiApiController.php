<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use App\Http\Resources\Admin\DetailTransaksiResource;
use App\Models\DetailTransaksi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailTransaksiApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('detail_transaksi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DetailTransaksiResource(DetailTransaksi::with(['kode_transaksi', 'kode_produks', 'kode_hpps', 'created_by'])->get());
    }

    public function store(StoreDetailTransaksiRequest $request)
    {
        $detailTransaksi = DetailTransaksi::create($request->all());
        $detailTransaksi->kode_produks()->sync($request->input('kode_produks', []));
        $detailTransaksi->kode_hpps()->sync($request->input('kode_hpps', []));
        if ($request->input('desain', false)) {
            $detailTransaksi->addMedia(storage_path('tmp/uploads/' . basename($request->input('desain'))))->toMediaCollection('desain');
        }

        return (new DetailTransaksiResource($detailTransaksi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DetailTransaksi $detailTransaksi)
    {
        abort_if(Gate::denies('detail_transaksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DetailTransaksiResource($detailTransaksi->load(['kode_transaksi', 'kode_produks', 'kode_hpps', 'created_by']));
    }

    public function update(UpdateDetailTransaksiRequest $request, DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->update($request->all());
        $detailTransaksi->kode_produks()->sync($request->input('kode_produks', []));
        $detailTransaksi->kode_hpps()->sync($request->input('kode_hpps', []));
        if ($request->input('desain', false)) {
            if (!$detailTransaksi->desain || $request->input('desain') !== $detailTransaksi->desain->file_name) {
                if ($detailTransaksi->desain) {
                    $detailTransaksi->desain->delete();
                }
                $detailTransaksi->addMedia(storage_path('tmp/uploads/' . basename($request->input('desain'))))->toMediaCollection('desain');
            }
        } elseif ($detailTransaksi->desain) {
            $detailTransaksi->desain->delete();
        }

        return (new DetailTransaksiResource($detailTransaksi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DetailTransaksi $detailTransaksi)
    {
        abort_if(Gate::denies('detail_transaksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
