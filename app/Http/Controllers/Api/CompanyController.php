<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
    * Fetch all companies
	* @return array
    */
    public function index()
    {
        return response()->json(Company::all());
    }

    /**
    * Create a new company
	* @return array
    */
    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->validated());

        return response()->json($company, 201);
    }

    /**
    * Show a single company
	* @return array
    */
    public function show($id)
    {
		$company = Company::find($id);
		
		if (!$company) {
			return response()->json([
				'error' => 'Company not found',
			], 404);
		}

		
        return response()->json($company);
    }

    /**
    * Update a company
	* @return array
    */
    public function update(CompanyRequest $request, string $id)
	{
		$company = Company::find($id);

		if (!$company) {
			return response()->json([
				'error' => 'Company not found',
			], 404);
		}

		$company->update($request->validated());

		return response()->json($company);
	}

    /**
    * Delete a company
	* @return null
    */
    public function destroy($id)
    {
		$company = Company::find($id);
		
		if (!$company) {
			return response()->json([
				'error' => 'Company not found',
			], 404);
		}
		
        $company->delete();

        return response()->json(null, 204);
    }
}
