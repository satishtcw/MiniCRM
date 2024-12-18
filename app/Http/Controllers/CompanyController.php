<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
	
	/**
     ********** Normally, I write comments for all logical lines, *********
	 **********but I am ignoring them for now to save time. *********
     */
	
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
		return view('companies.index', compact('companies'));
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
        $company = new Company($request->validated());

        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('public/logos');
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
		 
		return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
	{
		$company = Company::findOrFail($id);

		$company->name = $request->name;
		$company->email = $request->email;
		$company->website = $request->website;

		if ($request->hasFile('logo')) {
			if ($company->logo) {
				Storage::delete('public/' . $company->logo);
			}

			$logoPath = $request->file('logo')->store('logos', 'public');
			$company->logo = $logoPath;
		}

		$company->save();

		return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);

		if ($company->logo) {
			Storage::delete('public/' . $company->logo);
		}

		$company->delete();

		return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
