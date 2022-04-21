<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Requests\DetailTransaksiStoreRequest;
use App\Http\Requests\DetailTransaksiUpdateRequest;

class DetailTransaksiController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DetailTransaksi::class);

        $search = $request->get('search', '');

        $detailTransaksis = DetailTransaksi::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.detail_transaksis.index',
            compact('detailTransaksis', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', DetailTransaksi::class);

        return view('app.detail_transaksis.create');
    }

    /**
     * @param \App\Http\Requests\DetailTransaksiStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailTransaksiStoreRequest $request)
    {
        $this->authorize('create', DetailTransaksi::class);

        $validated = $request->validated();

        $detailTransaksi = DetailTransaksi::create($validated);

        return redirect()
            ->route('detail-transaksis.edit', $detailTransaksi)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DetailTransaksi $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DetailTransaksi $detailTransaksi)
    {
        $this->authorize('view', $detailTransaksi);

        return view('app.detail_transaksis.show', compact('detailTransaksi'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DetailTransaksi $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DetailTransaksi $detailTransaksi)
    {
        $this->authorize('update', $detailTransaksi);

        return view('app.detail_transaksis.edit', compact('detailTransaksi'));
    }

    /**
     * @param \App\Http\Requests\DetailTransaksiUpdateRequest $request
     * @param \App\Models\DetailTransaksi $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(
        DetailTransaksiUpdateRequest $request,
        DetailTransaksi $detailTransaksi
    ) {
        $this->authorize('update', $detailTransaksi);

        $validated = $request->validated();

        $detailTransaksi->update($validated);

        return redirect()
            ->route('detail-transaksis.edit', $detailTransaksi)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DetailTransaksi $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DetailTransaksi $detailTransaksi)
    {
        $this->authorize('delete', $detailTransaksi);

        $detailTransaksi->delete();

        return redirect()
            ->route('detail-transaksis.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
