<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryIndexRequest;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryIndexRequest $request): View
    {
        $categories = Category::with('media')
            ->filter(request(['s']))
            ->orderBy(request('sort_by', 'updated_at'), request('sort_type', 'desc'))
            ->select('id', 'name', 'is_active', 'updated_at')
            ->paginate()
            ->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());

        $category->addMediaFromRequest('photo')->toMediaCollection('category-photos');

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The category has been added successfully.')
            ]
        ]);

        return to_route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = request('is_active') ? 1 : 0;

        $category->update($validated);

        if (isset($validated['photo'])) {
            $category->clearMediaCollection('category-photos');
            $category->addMediaFromRequest('photo')->toMediaCollection('category-photos');
        }

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The category has been updated successfully.')
            ]
        ]);

        return to_route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category): RedirectResponse
    {
        $category->clearMediaCollection('category-photos');
        $category->delete();

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The category has been removed successfully.')
            ]
        ]);

        return str()->contains(url()->previous(), "/{$category->id}") ? to_route('admin.categories.index') : back();
    }
}
