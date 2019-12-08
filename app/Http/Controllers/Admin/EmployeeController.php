<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        return view('admin.employees.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->fill($request->only($employee->getFillable()));
        $employee->company()->associate(Company::find($request->company_id));
        $employee->save();
        return redirect()->route('admin.employee.index')->with('message', __('admin.employee_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.create', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest $request
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->fill($request->only($employee->getFillable()));
        $employee->company()->associate(Company::find($request->company_id));
        $employee->save();
        return redirect()->route('admin.employee.index')->with('message', __('admin.employee_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try{
            $employee->delete();
        }catch (\Exception $e) {
            return redirect()->route('admin.employees.index')->with('message', $e->getMessage());
        }
        return redirect()->route('admin.employee.index')->with('message', __('admin.employee_deleted'));
    }
}
