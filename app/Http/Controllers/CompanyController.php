<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validación de datos
            $validatedData = $request->validate([
                // Datos del usuario
                'user_name' => 'required|string|max:255',
                'user_email' => 'required|string|email|max:255|unique:users,email',
                'user_password' => 'required|string|min:8|confirmed',
                
                // Datos de la empresa
                'company_name' => 'required|string|max:255',
                'nit' => 'required|string|max:50|unique:companies,nit',
                'website' => 'nullable|url|max:255',
                'company_email' => 'required|email|max:255|unique:companies,email',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'terms' => 'required|accepted'
            ]);

            // Paso 1: Crear el usuario
            $user = User::create([
                'name' => $validatedData['user_name'],
                'email' => $validatedData['user_email'],
                'password' => Hash::make($validatedData['user_password']),
            ]);

            // Asignar rol 'company' al usuario
            $companyRole = Role::where('name', 'company')->firstOrFail();
            $user->roles()->attach($companyRole->id);

            // Paso 2: Crear la empresa asociada
            $company = Company::create([
                'user_id' => $user->id,
                'name' => $validatedData['company_name'],
                'nit' => $validatedData['nit'],
                'website' => $validatedData['website'],
                'email' => $validatedData['company_email'],
                'address' => $validatedData['address'],
                'phone' => $validatedData['phone']
            ]);

            DB::commit();

            // Autenticar al usuario
            auth()->login($user);

            return redirect()->route('superAdmin')
                ->with('success', 'Registro completado exitosamente. Bienvenido a nuestra plataforma.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()
                ->withInput()
                ->with('error', 'Ocurrió un error durante el registro: ' . $e->getMessage());
        }
    }
}