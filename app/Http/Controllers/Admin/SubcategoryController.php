<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\Admin\SubcategoryIndexRequest;
use App\Http\Requests\Admin\SubcategoryStoreRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubcategoryIndexRequest $request): View
    {
        $subcategories = Subcategory::with(['media', 'category:id,name'])
            ->filter(request(['s']))
            ->leftJoin('categories', 'subcategories.category_id', '=', 'categories.id')
            ->orderBy(request('sort_by', 'updated_at'), request('sort_type', 'desc'))
            ->select('subcategories.id', 'subcategories.category_id', 'subcategories.name', 'subcategories.is_active', 'subcategories.updated_at')
            ->paginate()
            ->withQueryString();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::latest()->select('id as value', 'name as text')->get()->toArray();

        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryStoreRequest $request): RedirectResponse
    {
        $subcategory = Subcategory::create($request->validated());

        $subcategory->addMediaFromRequest('photo')->toMediaCollection('subcategory-photos');

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The subcategory has been added successfully.')
            ]
        ]);

        return to_route('admin.subcategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory): View
    {
        return view('admin.subcategories.show', compact('subcategory'));
    }
}
