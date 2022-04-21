<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTanamans;
use App\Http\Requests\JenisTanamansStoreRequest;
use App\Http\Requests\JenisTanamansUpdateRequest;

class JenisTanamansController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', JenisTanamans::class);

        $search = $request->get('search', '');

        $allJenisTanamans = JenisTanamans::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_jenis_tanamans.index',
            compact('allJenisTanamans', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', JenisTanamans::class);

        return view('app.all_jenis_tanamans.create');
    }

    /**
     * @param \App\Http\Requests\JenisTanamansStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisTanamansStoreRequest $request)
    {
        $this->authorize('create', JenisTanamans::class);

        $validated = $request->validated();

        $jenisTanamans = JenisTanamans::create($validated);

        return redirect()
            ->route('all-jenis-tanamans.edit', $jenisTanamans)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JenisTanamans $jenisTanamans
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JenisTanamans $jenisTanamans)
    {
        $this->authorize('view', $jenisTanamans);

        return view('app.all_jenis_tanamans.show', compact('jenisTanamans'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JenisTanamans $jenisTanamans
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JenisTanamans $jenisTanamans)
    {
        $this->authorize('update', $jenisTanamans);

        return view('app.all_jenis_tanamans.edit', compact('jenisTanamans'));
    }

    /**
     * @param \App\Http\Requests\JenisTanamansUpdateRequest $request
     * @param \App\Models\JenisTanamans $jenisTanamans
     * @return \Illuminate\Http\Response
     */
    public function update(
        JenisTanamansUpdateRequest $request,
        JenisTanamans $jenisTanamans
    ) {
        $this->authorize('update', $jenisTanamans);

        $validated = $request->validated();

        $jenisTanamans->update($validated);

        return redirect()
            ->route('all-jenis-tanamans.edit', $jenisTanamans)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JenisTanamans $jenisTanamans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JenisTanamans $jenisTanamans)
    {
        $this->authorize('delete', $jenisTanamans);

        $jenisTanamans->delete();

        return redirect()
            ->route('all-jenis-tanamans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
