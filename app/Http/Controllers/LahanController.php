<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use Illuminate\Http\Request;
use App\Models\JenisTanamans;
use App\Http\Requests\LahanStoreRequest;
use App\Http\Requests\LahanUpdateRequest;

class LahanController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Lahan::class);

        $search = $request->get('search', '');

        $lahans = Lahan::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.lahans.index', compact('lahans', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Lahan::class);

        $allJenisTanamans = JenisTanamans::pluck('nama', 'id');

        return view('app.lahans.create', compact('allJenisTanamans'));
    }

    /**
     * @param \App\Http\Requests\LahanStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LahanStoreRequest $request)
    {
        $this->authorize('create', Lahan::class);

        $validated = $request->validated();

        $lahan = Lahan::create($validated);

        return redirect()
            ->route('lahans.edit', $lahan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lahan $lahan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Lahan $lahan)
    {
        $this->authorize('view', $lahan);

        return view('app.lahans.show', compact('lahan'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lahan $lahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Lahan $lahan)
    {
        $this->authorize('update', $lahan);

        $allJenisTanamans = JenisTanamans::pluck('nama', 'id');

        return view('app.lahans.edit', compact('lahan', 'allJenisTanamans'));
    }

    /**
     * @param \App\Http\Requests\LahanUpdateRequest $request
     * @param \App\Models\Lahan $lahan
     * @return \Illuminate\Http\Response
     */
    public function update(LahanUpdateRequest $request, Lahan $lahan)
    {
        $this->authorize('update', $lahan);

        $validated = $request->validated();

        $lahan->update($validated);

        return redirect()
            ->route('lahans.edit', $lahan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lahan $lahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Lahan $lahan)
    {
        $this->authorize('delete', $lahan);

        $lahan->delete();

        return redirect()
            ->route('lahans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
