<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Account;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TransactionType;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Create a default account for the user
        Account::create([
            'user_id' => $user->id,
            'name' => 'Base account',
            'description' => 'Default account',
        ]);

        // Create default transaction types for the user
        TransactionType::create([
            'name' => 'Income',
            'type' => 'income',
            'user_id' => $user->id,
        ]);

        TransactionType::create([
            'name' => 'Expense',
            'type' => 'expense',
            'user_id' => $user->id,
        ]);

        TransactionType::create([
            'name' => 'Transfer',
            'type' => 'transfer',
            'user_id' => $user->id,
        ]);

        return redirect(route('dashboard', absolute: false));
    }
}
