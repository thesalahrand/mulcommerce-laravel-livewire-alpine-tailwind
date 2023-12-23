<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('vendor.profile.edit', [
            'user' => $user->with('vendorDetails')->find($user->id)
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if (isset($validated['photo'])) {
            !is_null($request->user()->photo) && Storage::disk('public')->delete($request->user()->photo);
            $validated['photo'] = $validated['photo']->store('users', 'public');
        }

        $user = $request->user();
        $user->update(collect($validated)->except('founded_in', 'additional_info')->toArray());
        $user->vendorDetails()->update(collect($validated)->only('founded_in', 'additional_info')->toArray());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
        $request->session()->flash('flash', [
            'toast-message' => [
                'type' => 'success',
                'message' => trans('Profile information updated successfully.')
            ]
        ]);
        return Redirect::route('vendor.profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
