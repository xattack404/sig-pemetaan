<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Requests\TransaksiStoreRequest;
use App\Http\Requests\TransaksiUpdateRequest;

class TransaksiController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Transaksi::class);

        $search = $request->get('search', '');

        $transaksis = Transaksi::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.transaksis.index', compact('transaksis', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Transaksi::class);

        $detailTransaksis = DetailTransaksi::pluck('total', 'id');
        $barangs = Barang::pluck('nama', 'id');

        return view(
            'app.transaksis.create',
            compact('detailTransaksis', 'barangs')
        );
    }

    /**
     * @param \App\Http\Requests\TransaksiStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiStoreRequest $request)
    {
        $this->authorize('create', Transaksi::class);

        $validated = $request->validated();

        $transaksi = Transaksi::create($validated);

        return redirect()
            ->route('transaksis.edit', $transaksi)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaksi $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Transaksi $transaksi)
    {
        $this->authorize('view', $transaksi);

        return view('app.transaksis.show', compact('transaksi'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaksi $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Transaksi $transaksi)
    {
        $this->authorize('update', $transaksi);

        $detailTransaksis = DetailTransaksi::pluck('total', 'id');
        $barangs = Barang::pluck('nama', 'id');

        return view(
            'app.transaksis.edit',
            compact('transaksi', 'detailTransaksis', 'barangs')
        );
    }

    /**
     * @param \App\Http\Requests\TransaksiUpdateRequest $request
     * @param \App\Models\Transaksi $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(
        TransaksiUpdateRequest $request,
        Transaksi $transaksi
    ) {
        $this->authorize('update', $transaksi);

        $validated = $request->validated();

        $transaksi->update($validated);

        return redirect()
            ->route('transaksis.edit', $transaksi)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaksi $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Transaksi $transaksi)
    {
        $this->authorize('delete', $transaksi);

        $transaksi->delete();

        return redirect()
            ->route('transaksis.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
