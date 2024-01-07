<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandIndexRequest;
use App\Http\Requests\Admin\BrandStoreRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandIndexRequest $request): View
    {
        $brands = Brand::with('media')
            ->filter(request(['s']))
            ->orderBy(request('sort_by', 'updated_at'), request('sort_type', 'desc'))
            ->select('id', 'name', 'is_active', 'updated_at')
            ->paginate()
            ->withQueryString();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request): RedirectResponse
    {
        $brand = Brand::create($request->validated());

        $brand->addMediaFromRequest('logo')->toMediaCollection('brand-logos');

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The brand has been added successfully.')
            ]
        ]);

        return to_route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): View
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = request('is_active') ? 1 : 0;

        $brand->update($validated);

        if (isset($validated['logo'])) {
            $brand->clearMediaCollection('brand-logos');
            $brand->addMediaFromRequest('logo')->toMediaCollection('brand-logos');
        }

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The brand has been updated successfully.')
            ]
        ]);

        return to_route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Brand $brand): RedirectResponse
    {
        $brand->clearMediaCollection('brand-logos');
        $brand->delete();

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The brand has been removed successfully.')
            ]
        ]);

        return str()->contains(url()->previous(), "/{$brand->id}") ? to_route('admin.brands.index') : back();
    }
}
