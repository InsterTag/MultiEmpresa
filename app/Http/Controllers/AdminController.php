<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;


class AdminController extends Controller
{
public function showCompaniesAndUsers()
{
    $companies = Company::select('id', 'name', 'nit', 'email', 'phone', 'created_at')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

     $users = User::with('roles')
                ->select('id', 'name', 'email', 'created_at')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

    return view('profiles.admin.admin', compact('companies', 'users'));
}

}
