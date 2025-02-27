<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinLoginController extends Controller
{
    /**
     * Display the PIN login view.
     */
    public function create(Request $request)
    {
        $storeId = $request->store_id;

        // Get store and employees if store ID is provided
        $store = null;
        $employees = [];

        if ($storeId) {
            $store = Store::find($storeId);

            if ($store) {
                $employees = User::whereHas('stores', function($query) use ($storeId) {
                    $query->where('stores.id', $storeId);
                })
                ->where('role', '!=', 'super-admin')
                ->where('status', 'active')
                ->whereNotNull('pin_code')
                ->select('id', 'name', 'role')
                ->get();
            }
        }

        // Get all stores
        $stores = Store::orderBy('name')->get(['id', 'name']);

        return view('auth.pin-login', [
            'stores' => $stores,
            'selectedStore' => $store,
            'employees' => $employees,
        ]);
    }

    /**
     * Handle an incoming PIN login request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pin_code' => 'required|string',
            'store_id' => 'required|exists:stores,id',
        ]);

        $user = User::find($request->user_id);

        // Verify PIN
        if (!$user || $user->pin_code !== $request->pin_code) {
            return back()->withErrors([
                'pin_code' => 'Invalid PIN code.',
            ])->withInput($request->except('pin_code'));
        }

        // Check if user has access to this store
        $hasAccess = $user->stores()->where('stores.id', $request->store_id)->exists();

        if (!$hasAccess) {
            return back()->withErrors([
                'user_id' => 'You do not have access to this store.',
            ])->withInput($request->except('pin_code'));
        }

        // Check if tenant is active
        if ($user->tenant && !$user->tenant->isActive()) {
            return back()->withErrors([
                'user_id' => 'This account has been suspended. Please contact support.',
            ])->withInput($request->except('pin_code'));
        }

        // Log the user in
        Auth::login($user);

        // Store the selected store for this session
        session(['current_store_id' => $request->store_id]);

        return redirect()->route('pos.index');
    }
}
