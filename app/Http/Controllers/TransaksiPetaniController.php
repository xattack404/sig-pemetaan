<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPetani;
use App\Http\Requests\TransaksiPetaniStoreRequest;
use App\Http\Requests\TransaksiPetaniUpdateRequest;

class TransaksiPetaniController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TransaksiPetani::class);

        $search = $request->get('search', '');

        $transaksiPetanis = TransaksiPetani::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.transaksi_petanis.index',
            compact('transaksiPetanis', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TransaksiPetani::class);

        return view('app.transaksi_petanis.create');
    }

    /**
     * @param \App\Http\Requests\TransaksiPetaniStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiPetaniStoreRequest $request)
    {
        $this->authorize('create', TransaksiPetani::class);

        $validated = $request->validated();

        $transaksiPetani = TransaksiPetani::create($validated);

        return redirect()
            ->route('transaksi-petanis.edit', $transaksiPetani)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TransaksiPetani $transaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TransaksiPetani $transaksiPetani)
    {
        $this->authorize('view', $transaksiPetani);

        return view('app.transaksi_petanis.show', compact('transaksiPetani'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TransaksiPetani $transaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TransaksiPetani $transaksiPetani)
    {
        $this->authorize('update', $transaksiPetani);

        return view('app.transaksi_petanis.edit', compact('transaksiPetani'));
    }

    /**
     * @param \App\Http\Requests\TransaksiPetaniUpdateRequest $request
     * @param \App\Models\TransaksiPetani $transaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function update(
        TransaksiPetaniUpdateRequest $request,
        TransaksiPetani $transaksiPetani
    ) {
        $this->authorize('update', $transaksiPetani);

        $validated = $request->validated();

        $transaksiPetani->update($validated);

        return redirect()
            ->route('transaksi-petanis.edit', $transaksiPetani)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TransaksiPetani $transaksiPetani
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TransaksiPetani $transaksiPetani)
    {
        $this->authorize('delete', $transaksiPetani);

        $transaksiPetani->delete();

        return redirect()
            ->route('transaksi-petanis.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
