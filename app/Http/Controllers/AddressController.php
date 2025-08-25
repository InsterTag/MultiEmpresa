<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Auth::user()->addresses;
        return view('addresses.index', compact('addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'department' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
        ]);

        Auth::user()->addresses()->create($request->all());

        return back()->with('success', 'Dirección agregada correctamente.');
    }

    public function update(Request $request, Address $address)
    {
        // Validamos que la dirección pertenezca al usuario logueado
        if ($address->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta dirección.');
        }

        $request->validate([
            'address' => 'required|string|max:255',
            'department' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
        ]);

        $address->update($request->all());

        return back()->with('success', 'Dirección actualizada.');
    }

    public function destroy(Address $address)
    {
        // Validamos que la dirección pertenezca al usuario logueado
        if ($address->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta dirección.');
        }

        $address->delete();

        return back()->with('success', 'Dirección eliminada.');
    }
}
