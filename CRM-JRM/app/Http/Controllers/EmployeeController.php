<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view("add-employee", compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //form validation
         $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'company_id' => 'required|exists:companies,id',
                'email' => 'required|email',
                'phone' => 'required',
        ]);

        try {
                $new_employee = new Employee;
                $new_employee->firstname = $request->firstname;
                $new_employee->lastname = $request->lastname;
                $new_employee->company_id = $request->company_id;
                $new_employee->email = $request->email;
                $new_employee->phone = $request->phone;
                $new_employee->save();

                return redirect('/employees')->with('success','Company Added Successfully');
        } catch (\Exception $e) {
                return redirect('/add/employees')->with('fail',$e->getMessage());
        }
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
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        return view('edit-employee', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
                //form validation
                $request->validate([
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'company_id' => 'required|exists:companies,id',
                    'email' => 'required|email',
                    'phone' => 'required',

                ]);

                try {
                    $employee = Employee::findOrFail($request->employee_id);
                    $employee->firstname = $request->firstname;
                    $employee->lastname = $request->lastname;
                    $employee->company_id = $request->company_id;
                    $employee->email = $request->email;
                    $employee->phone = $request->phone;
                    $employee->save();
                        return redirect('/employees')->with('success','Employee Updated Successfully');
                } catch (\Exception $e) {
                        return redirect('/edit/employee')->with('fail',$e->getMessage());
                }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Employee::where('id', $id)->delete();
            return redirect('/employees')->with('success','Employee Deleted Successfully');
        } catch (\Exception $e) {
           return redirect('/employees')->with('fail',$e->getMessage());
        }
    }
}
