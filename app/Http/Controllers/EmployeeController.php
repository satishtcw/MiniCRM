<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
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
        $employees = Employee::with('company')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
		$employee = new Employee($request->validated());

        if ($request->hasFile('profile_pic')) {
            $employee->profile_pic = $request->file('profile_pic')->store('public/profile_pics');
        }

        if ($request->hasFile('document')) {
            $employee->document = $request->file('document')->store('public/documents');
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with('company')->findOrFail($id);
		 
		return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $employee = Employee::findOrFail($id);
		
		$employee->first_name = $request->first_name;
		$employee->last_name = $request->last_name;
		$employee->company_id = $request->company_id;
		$employee->email = $request->email;
		$employee->phone = $request->phone;
		

        if ($request->hasFile('profile_pic')) {
			if ($employee->profile_pic) {
				Storage::delete('public/' . $employee->profile_pic);
			}
            $employee->profile_pic = $request->file('profile_pic')->store('profile_pics', 'public');
        }

        if ($request->hasFile('document')) {
			if ($employee->document) {
				Storage::delete('public/' . $employee->document);
			}
            $employee->document = $request->file('document')->store('documents', 'public');
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }
	
	/**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
		if ($employee->profile_pic) {
			Storage::delete('public/' . $employee->profile_pic);
		}
		if ($employee->document) {
			Storage::delete('public/' . $employee->document);
		}
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
