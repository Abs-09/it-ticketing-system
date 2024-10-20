<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Error;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function index(): View
    {
        return view('users.index', [
            'users' => User::withTrashed()->paginate(10)
        ]);
    }


    public function create(): View
    {
        return view('users.create');
    }


    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'Error while writing user, please check your form details');
        }

        return redirect()->route('users.index')->with('success', 'User added successfully');
    }

    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect(route('users.index'))->with('success', 'user details updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        User::destroy($request->user_id);

        return redirect()->back()->with('success', "User deleted");
    }

    public function restore(User $user): RedirectResponse
    {
        dd('here');
        try {
            $user->restore();
        } catch (\Exception $e) {
            return redirect()->with('error', 'Something went wrong');
        }

        return redirect()->back()->with('success', "User restored");
    }
}
