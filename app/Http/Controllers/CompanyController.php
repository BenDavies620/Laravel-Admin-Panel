<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);

        $totalCompanies = Company::count();
        $companiesWithLogos = Company::whereNotNull('logo')->count();

        return view('companies.index', [
            'companies' => $companies,
            'totalCompanies' => $totalCompanies,
            'companiesWithLogos' => $companiesWithLogos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo')){
            $validated['logo'] = $request->file('logo')->store('companies', 'public');
        }

        Company::create($validated);

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $validated = $request->validated();

        $removeLogo = $validated['remove_logo'] ?? false;

        unset($validated['remove_logo']);

        $oldLogo = null;

        if ($request->hasFile('logo')) {
            $oldLogo = $company->logo;
            $validated['logo'] = $request->file('logo')->store('companies', 'public');
        }elseif ($removeLogo && $company->logo) {
            $oldLogo = $company->logo;
            $validated['logo'] = null;
        }

        $company->update($validated);

        if ($oldLogo !== null) {
            Storage::disk('public')->delete($oldLogo);
        }

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted!');
    }
}
