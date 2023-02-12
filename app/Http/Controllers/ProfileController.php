<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password as RulesPassword;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->username) {
            $user = User::where('username', $request->username)
                ->whereBetween('created_at', [$request->startTime, date('Y-m-d', strtotime('+1 days')), $request->endTime]);
        } elseif ($request->email) {
            $user = User::where('email', $request->email)
                ->whereBetween('created_at', [$request->startTime, date('Y-m-d', strtotime('+1 days')), $request->endTime]);
        } else {
            $user = new User;
        }

        $users = $user->paginate()->withQueryString();
        $values = User::select('username', 'name', 'email')->get();
        return view('profile.index', compact('users', 'values'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(User $user): View
    {
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'username' => ['required', 'alpha_num', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'picture' => ['image', 'file', 'max:1024']
        ]);

        if ($request->file('picture')) {
            Storage::delete($request->oldPicture);
            $image = $request->file('picture')->store('users');
        } else {
            $image = $request->oldPicture;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'picture' => $image
        ]);

        return redirect('/user')->with('success', 'Successfully registered');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {

        $user->delete();

        return redirect()->back()->with('success', 'Successfully deleted');
    }
}
