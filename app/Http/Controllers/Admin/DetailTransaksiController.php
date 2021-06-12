<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDetailTransaksiRequest;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use App\Models\DetailTransaksi;
use App\Models\Hpp;
use App\Models\Produk;
use App\Models\Transaksi;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DetailTransaksiController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('detail_transaksi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksis = DetailTransaksi::with(['kode_transaksi', 'kode_produks', 'kode_hpps', 'created_by', 'media'])->get();

        return view('admin.detailTransaksis.index', compact('detailTransaksis'));
    }

    public function create()
    {
        abort_if(Gate::denies('detail_transaksi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_transaksis = Transaksi::all()->pluck('kode_transaksi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kode_produks = Produk::all()->pluck('kode_produk', 'id');

        $kode_hpps = Hpp::all()->pluck('kode_hpp', 'id');

        return view('admin.detailTransaksis.create', compact('kode_transaksis', 'kode_produks', 'kode_hpps'));
    }

    public function store(StoreDetailTransaksiRequest $request)
    {
        $detailTransaksi = DetailTransaksi::create($request->all());
        $detailTransaksi->kode_produks()->sync($request->input('kode_produks', []));
        $detailTransaksi->kode_hpps()->sync($request->input('kode_hpps', []));
        if ($request->input('desain', false)) {
            $detailTransaksi->addMedia(storage_path('tmp/uploads/' . basename($request->input('desain'))))->toMediaCollection('desain');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $detailTransaksi->id]);
        }

        return redirect()->route('admin.detail-transaksis.index');
    }

    public function edit(DetailTransaksi $detailTransaksi)
    {
        abort_if(Gate::denies('detail_transaksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_transaksis = Transaksi::all()->pluck('kode_transaksi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kode_produks = Produk::all()->pluck('kode_produk', 'id');

        $kode_hpps = Hpp::all()->pluck('kode_hpp', 'id');

        $detailTransaksi->load('kode_transaksi', 'kode_produks', 'kode_hpps', 'created_by');

        return view('admin.detailTransaksis.edit', compact('kode_transaksis', 'kode_produks', 'kode_hpps', 'detailTransaksi'));
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

        return redirect()->route('admin.detail-transaksis.index');
    }

    public function show(DetailTransaksi $detailTransaksi)
    {
        abort_if(Gate::denies('detail_transaksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksi->load('kode_transaksi', 'kode_produks', 'kode_hpps', 'created_by');

        return view('admin.detailTransaksis.show', compact('detailTransaksi'));
    }

    public function destroy(DetailTransaksi $detailTransaksi)
    {
        abort_if(Gate::denies('detail_transaksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detailTransaksi->delete();

        return back();
    }

    public function massDestroy(MassDestroyDetailTransaksiRequest $request)
    {
        DetailTransaksi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('detail_transaksi_create') && Gate::denies('detail_transaksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DetailTransaksi();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
