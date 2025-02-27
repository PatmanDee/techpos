<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'business_name' => 'required|string|max:255',
            'business_phone' => 'nullable|string|max:50',
            'terms' => 'required|accepted',
        ]);

        // Create the tenant
        $tenant = Tenant::create([
            'name' => $request->business_name,
            'email' => $request->email,
            'phone' => $request->business_phone,
            'subscription_plan' => 'trial', // Default to trial plan
            'subscription_status' => 'pending', // Require activation
            'features' => ['pos', 'inventory', 'customers'], // Basic features
            'max_stores' => 1,
            'max_users' => 2,
            'max_products' => 50,
        ]);

        // Create the user (as owner)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tenant_id' => $tenant->id,
            'role' => 'owner',
            'status' => 'active',
        ]);

        // Create default store
        $store = $tenant->stores()->create([
            'name' => 'Main Store',
            'is_main_store' => true,
        ]);

        // Assign owner to the store
        $user->stores()->attach($store->id);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard.welcome');
    }
}
