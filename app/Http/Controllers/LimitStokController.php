<?php

namespace App\Http\Controllers;

use App\Models\LimitStok;
use Illuminate\Http\Request;
use App\Http\Requests\LimitStokStoreRequest;
use App\Http\Requests\LimitStokUpdateRequest;

class LimitStokController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', LimitStok::class);

        $search = $request->get('search', '');

        $limitStoks = LimitStok::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.limit_stoks.index', compact('limitStoks', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', LimitStok::class);

        return view('app.limit_stoks.create');
    }

    /**
     * @param \App\Http\Requests\LimitStokStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LimitStokStoreRequest $request)
    {
        $this->authorize('create', LimitStok::class);

        $validated = $request->validated();

        $limitStok = LimitStok::create($validated);

        return redirect()
            ->route('limit-stoks.edit', $limitStok)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LimitStok $limitStok
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LimitStok $limitStok)
    {
        $this->authorize('view', $limitStok);

        return view('app.limit_stoks.show', compact('limitStok'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LimitStok $limitStok
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LimitStok $limitStok)
    {
        $this->authorize('update', $limitStok);

        return view('app.limit_stoks.edit', compact('limitStok'));
    }

    /**
     * @param \App\Http\Requests\LimitStokUpdateRequest $request
     * @param \App\Models\LimitStok $limitStok
     * @return \Illuminate\Http\Response
     */
    public function update(
        LimitStokUpdateRequest $request,
        LimitStok $limitStok
    ) {
        $this->authorize('update', $limitStok);

        $validated = $request->validated();

        $limitStok->update($validated);

        return redirect()
            ->route('limit-stoks.edit', $limitStok)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LimitStok $limitStok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, LimitStok $limitStok)
    {
        $this->authorize('delete', $limitStok);

        $limitStok->delete();

        return redirect()
            ->route('limit-stoks.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
