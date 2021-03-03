<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index()
    {
        $employeeList = Employee::with('company')->paginate(10);
        return view('backend.employees.index',compact('employeeList'));
    }

    public function create()
    {
        $companyList = Company::get();
        $page_title = "Add Employee";
        return view('backend.employees.options',compact('page_title','companyList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $employee = new Employee();
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->company_id = $request->company_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if($employee->save())
        {
            $notification = ['toastr'=>"Employee details update successfully",'type'=>'success'];
            return redirect()->route('employee.index')->with($notification);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $companyList = Company::get();
        $page_title = "Edit Employee";
        return view('backend.employees.options',compact('page_title','employee','companyList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->company_id = $request->company_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if($employee->save())
        {
            $notification = ['toastr'=>"Employee details update successfully",'type'=>'success'];
            return redirect()->route('employee.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        if($employee->delete())
        {
            $notification = ['toastr'=>"Employee delete successfully",'type'=>'success'];
            return redirect()->route('employee.index')->with($notification);
        }
    }
}
