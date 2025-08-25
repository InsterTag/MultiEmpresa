<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


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
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validación
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Actualizar username
        $user->username = $request->username;

        // Actualizar contraseña si se envió
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }




    public function uploadImage(Request $request)
{
    $request->validate([
        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
    ]);

    $user = auth()->user();

    if ($request->hasFile('profile_image')) {
        // Guardar en storage/public/profile_images
        $path = $request->file('profile_image')->store('profile_images', 'public');

        // Actualizar usuario
        $user->profile_image = $path;
        $user->save();

        return response()->json([
            'success' => true,
            'image_url' => asset('storage/' . $path)
        ]);
    }

    return response()->json(['success' => false], 400);
}





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



 // Mostrar dirección en la vista
    public function showAddress()
    {
        $user = Auth::user();
        return view('profiles.user.items.Address', compact('user'));
    }




    // Guardar dirección
    public function updateAddress(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name'       => 'required|string|max:255',
        'last_name'  => 'nullable|string|max:255',
        'phone'      => 'nullable|string|max:20',
        'address'    => 'nullable|string|max:255',
        'department' => 'nullable|string|max:255',
        'postalcode' => 'nullable|string|max:20',
    ]);

    // Asignar manualmente
    $user->name       = $request->name;
    $user->last_name  = $request->last_name;
    $user->phone      = $request->phone;
    $user->address    = $request->address;
    $user->department = $request->department;
    $user->postalcode = $request->postalcode;

    $user->save();

    return redirect()->back()->with('success', 'Dirección actualizada correctamente ✅');
}





}
