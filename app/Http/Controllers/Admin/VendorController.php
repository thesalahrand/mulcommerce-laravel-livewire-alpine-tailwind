<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vendors = User::with('vendorDetails')
            ->vendor()
            ->filter(request(['s']))
            ->orderBy(request('sort_by', 'updated_at'), request('sort_type', 'desc'))
            ->select('users.id', 'users.name', 'users.email', 'users.username', 'users.phone', 'users.is_active', 'users.updated_at')
            ->paginate()
            ->withQueryString();

        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $vendor): View
    {
        if ($vendor->role !== 'vendor')
            back();

        $vendor = $vendor->load('vendorDetails');

        return view('admin.vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $vendor)
    {
        if ($vendor->role !== 'vendor')
            back();

        $vendor->clearMediaCollection('profile-photos');
        $vendor->delete();

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The vendor has been removed successfully.')
            ]
        ]);

        return str()->contains(url()->previous(), "/{$vendor->id}") ? to_route('admin.vendors.index') : back();
    }

    public function toggleStatus(Request $request, User $vendor)
    {
        if ($vendor->role !== 'vendor')
            back();

        $vendor->is_active = !$vendor->is_active;
        $vendor->save();

        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('The vendor has been ' . ($vendor->is_active ? 'activated' : 'deactivated') . ' successfully.')
            ]
        ]);

        return back();
    }
}
