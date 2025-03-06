<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        // dd($request);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            if ($request->user()->photo) {
                Storage::disk('public')->delete($request->user()->photo);
            }

            $photoPath = $photo->store('photos', 'public');

            $request->user()->photo = $photoPath;
        }

        $request->user()->salaire     = $request->salaire;
        $request->user()->date_credit = $request->date_credit;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's profile information.
     */
    public function updateSalary(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'salaire'     => ['required', 'numeric', 'min:0'],
            'date_credit' => ['required', 'date'],
        ]);

        $user = $request->user();

        $user->salaire     = $request->input('salaire');
        $user->date_credit = $request->input('date_credit');

        $user->save();

        return redirect()->route('profile.edit');
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
