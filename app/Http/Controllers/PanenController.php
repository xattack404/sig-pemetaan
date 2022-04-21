<?php

namespace App\Http\Controllers;

use App\Models\Panen;
use App\Models\Lahan;
use Illuminate\Http\Request;
use App\Http\Requests\PanenStoreRequest;
use App\Http\Requests\PanenUpdateRequest;

class PanenController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Panen::class);

        $search = $request->get('search', '');

        $panens = Panen::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.panens.index', compact('panens', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Panen::class);

        $lahans = Lahan::pluck('nama', 'id');

        return view('app.panens.create', compact('lahans'));
    }

    /**
     * @param \App\Http\Requests\PanenStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PanenStoreRequest $request)
    {
        $this->authorize('create', Panen::class);

        $validated = $request->validated();

        $panen = Panen::create($validated);

        return redirect()
            ->route('panens.edit', $panen)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Panen $panen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Panen $panen)
    {
        $this->authorize('view', $panen);

        return view('app.panens.show', compact('panen'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Panen $panen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Panen $panen)
    {
        $this->authorize('update', $panen);

        $lahans = Lahan::pluck('nama', 'id');

        return view('app.panens.edit', compact('panen', 'lahans'));
    }

    /**
     * @param \App\Http\Requests\PanenUpdateRequest $request
     * @param \App\Models\Panen $panen
     * @return \Illuminate\Http\Response
     */
    public function update(PanenUpdateRequest $request, Panen $panen)
    {
        $this->authorize('update', $panen);

        $validated = $request->validated();

        $panen->update($validated);

        return redirect()
            ->route('panens.edit', $panen)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Panen $panen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Panen $panen)
    {
        $this->authorize('delete', $panen);

        $panen->delete();

        return redirect()
            ->route('panens.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
