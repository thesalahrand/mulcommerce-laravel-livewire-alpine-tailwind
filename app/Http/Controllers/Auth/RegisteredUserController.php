<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\VendorDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = $validated['role'] === 'vendor' ? 0 : 1;

        if ($validated['role'] === 'user')
            $validated = collect($validated)->except('phone', 'address', 'photo')->toArray();

        $user = User::create($validated);

        if ($validated['role'] === 'vendor') {
            $user->addMediaFromRequest('photo')->toMediaCollection('vendor-photos');

            VendorDetail::create(['user_id' => $user->id]);

        }

        // event(new Registered($user));

        Auth::login($user);

        return to_route(RouteServiceProvider::getHomeUrl($validated['role']));
    }
}
