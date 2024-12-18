<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
    * Fetch all employees
    */
    public function index()
    {
        return response()->json(Employee::with('company')->get());
    }

    /**
    * Create a new employee
    */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        return response()->json($employee, 201);
    }

    /**
    * Show a single employee
    */
    public function show($id)
    {
		$employee = Employee::find($id);
		
		if (!$employee) {
			return response()->json([
				'error' => 'Employee not found',
			], 404);
		}
        return response()->json($employee);
    }

    /**
    * Update an employee
    */
    public function update(EmployeeRequest $request, string $id)
    {
		$employee = Employee::find($id);

		if (!$employee) {
			return response()->json([
				'error' => 'Employee not found',
			], 404);
		}
		
        $employee->update($request->validated());

        return response()->json($employee);
    }

    /**
    * Delete an employee
    */
    public function destroy($id)
    {
		$employee = Employee::find($id);
		
		if (!$employee) {
			return response()->json([
				'error' => 'Employee not found',
			], 404);
		}
        $employee->delete();

        return response()->json(null, 204);
    }
}