<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;

class AdminController extends Controller
{
public function showCompanies()
{
    $companies = Company::select('id', 'name', 'nit', 'email', 'phone', 'created_at')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10); // 10 empresas por página
    
    return view('profiles.admin.admin', compact('companies'));
}
}
