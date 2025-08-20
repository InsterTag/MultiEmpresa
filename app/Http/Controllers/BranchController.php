<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
// Mostrar lista de branches
    public function index()
    {
        $user = Auth::user();
        $companyId = $user->company_id ?? 1; // o el id por defecto si no hay empresa

        $branches = Branch::where('company_id', $companyId)->paginate(10);

        return view('profiles.company.branches.branches', compact('branches'));
    }

    // Guardar nueva branch
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
        ]);

        $user = Auth::user();
        $companyId = $user->company_id ?? 1; // por defecto si no hay empresa

        $branch = new Branch();
        $branch->company_id = $companyId;
        $branch->name       = $request->name;
        $branch->address    = $request->address;
        $branch->email      = $request->email;
        $branch->phone      = $request->phone;
        $branch->save();

        return redirect()->back()->with('success', 'Sucursal creada correctamente.');
    }

    // Eliminar branch
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->back()->with('success', 'Sucursal eliminada correctamente.');
    }
}
