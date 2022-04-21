<?php

namespace App\Http\Controllers;

use App\Models\Panen;
use Illuminate\Http\Request;
use App\Models\TransaksiPetani;
use App\Models\ItemTransaksiPetani;
use App\Http\Requests\ItemTransaksiPetaniStoreRequest;
use App\Http\Requests\ItemTransaksiPetaniUpdateRequest;

class ItemTransaksiPetaniController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ItemTransaksiPetani::class);

        $search = $request->get('search', '');

        $itemTransaksiPetanis = ItemTransaksiPetani::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.item_transaksi_petanis.index',
            compact('itemTransaksiPetanis', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ItemTransaksiPetani::class);

        $panens = Panen::pluck('stok', 'id');
        $transaksiPetanis = TransaksiPetani::pluck('total', 'id');

        return view(
            'app.item_transaksi_petanis.create',
            compact('panens', 'transaksiPetanis')
        );
    }

    /**
     * @param \App\Http\Requests\ItemTransaksiPetaniStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemTransaksiPetaniStoreRequest $request)
    {
        $this->authorize('create', ItemTransaksiPetani::class);

        $validated = $request->validated();

        $itemTransaksiPetani = ItemTransaksiPetani::create($validated);

        return redirect()
            ->route('item-transaksi-petanis.edit', $itemTransaksiPetani)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemTransaksiPetani $itemTransaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        ItemTransaksiPetani $itemTransaksiPetani
    ) {
        $this->authorize('view', $itemTransaksiPetani);

        return view(
            'app.item_transaksi_petanis.show',
            compact('itemTransaksiPetani')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemTransaksiPetani $itemTransaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        ItemTransaksiPetani $itemTransaksiPetani
    ) {
        $this->authorize('update', $itemTransaksiPetani);

        $panens = Panen::pluck('stok', 'id');
        $transaksiPetanis = TransaksiPetani::pluck('total', 'id');

        return view(
            'app.item_transaksi_petanis.edit',
            compact('itemTransaksiPetani', 'panens', 'transaksiPetanis')
        );
    }

    /**
     * @param \App\Http\Requests\ItemTransaksiPetaniUpdateRequest $request
     * @param \App\Models\ItemTransaksiPetani $itemTransaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function update(
        ItemTransaksiPetaniUpdateRequest $request,
        ItemTransaksiPetani $itemTransaksiPetani
    ) {
        $this->authorize('update', $itemTransaksiPetani);

        $validated = $request->validated();

        $itemTransaksiPetani->update($validated);

        return redirect()
            ->route('item-transaksi-petanis.edit', $itemTransaksiPetani)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemTransaksiPetani $itemTransaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ItemTransaksiPetani $itemTransaksiPetani
    ) {
        $this->authorize('delete', $itemTransaksiPetani);

        $itemTransaksiPetani->delete();

        return redirect()
            ->route('item-transaksi-petanis.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
