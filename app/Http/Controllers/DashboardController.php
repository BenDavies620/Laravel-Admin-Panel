<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index() 
    {
        $totalCompanies = Company::count();

        $totalEmployees = Employee::count();

        $employeesAssigned = Employee::whereNotNull('company_id')->count();

        $employeesUnassigned = Employee::whereNull('company_id')->count();

        $recentCompanies = Company::latest()->take(5)->get();

        $recentEmployees = Employee::with('company')->latest()->take(5)->get();

        return view('home', [
            'totalCompanies' => $totalCompanies,
            'totalEmployees' => $totalEmployees,
            'employeesAssigned' => $employeesAssigned,
            'employeesUnassigned' => $employeesUnassigned,
            'recentCompanies' => $recentCompanies,
            'recentEmployees' => $recentEmployees
        ]);
    }
}
