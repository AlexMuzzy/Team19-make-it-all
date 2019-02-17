<?php

namespace App\Http\Controllers;

use App\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = employees::all();
        return view('employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fname'=>'required',
            'sname'=> 'required',
            'jobTitle' => 'required',
            'department' => 'required',
            'telephone' => 'required'
        ]);
        
        $row = new employees([
            'fname' => $request->get('fname'),
            'sname'=> $request->get('sname'),
            'jobTitle'=> $request->get('jobTitle'),
            'department'=> $request->get('department'),
            'telephone' => $request->get('telephone')
        ]);

        $row->save();
        return redirect()->action('EmployeesController@index',['Success' => 'Employee has been added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = employees::find($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'fname'=>'required',
            'sname'=> 'required',
            'jobTitle' => 'required',
            'department' => 'required',
            'telephone' => 'required'
        ]);
        
        $employee = employees::find($id);
        $employee->fname=$request->get('fname');
        $employee->sname=$request->get('sname');
        $employee->jobTitle=$request->get('jobTitle');
        $employee->department=$request->get('department');
        $employee->telephone=$request->get('telephone');
        $employee->save();

        return redirect()->action('EmployeesController@index',['Success' => 'Employee has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees $employees)
    {
        //
    }
}
