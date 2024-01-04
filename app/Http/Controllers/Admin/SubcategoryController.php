<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\Admin\SubcategoryIndexRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory): View
    {
        return view('admin.subcategories.show', compact('subcategory'));
    }
}
