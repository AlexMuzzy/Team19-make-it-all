<?php

namespace App\Http\Controllers;

use App\specialists;
use Illuminate\Http\Request;
use DB;

class SpecialistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdetails = 
            DB::table('specialists')
                ->join('employees', 'specialists.employeeid', '=', 'employees.id')
                ->select('specialists.*','employees.fname','employees.sname')
                ->get();

        return view('specialists.specialists', compact('userdetails'));
        //Return specialists table view with name of route.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('specialists.new');
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
        'employeeid' => 'required',
        //'employeeid' => ['required','unique:specialists,employeeid','exists:employees,id'],
        'hardwareExpert'=> 'required',
        'softwareExpert' => 'required',
        'networkExpert' => 'required'
        ]);

        $specialist = new specialists([
        'employeeid' => $request->get('employeeid'),
        'hardwareExpert'=> $request->get('hardwareExpert'),
        'softwareExpert'=> $request->get('softwareExpert'),
        'networkExpert'=> $request->get('networkExpert'),
        'assignedCases'=> 0,
        'solvedCases' => 0
        ]);

        $specialist->save();
        return redirect()->action('SpecialistsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function show(specialists $specialists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function edit(specialists $specialists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hardwareExpert' => 'required',
            'softwareExpert' => 'required',
            'networkExpert' => 'required'
            ]);
        //
        $specialist = Specialists::find($id);
        $specialist->hardwareExpert=$request->get('hardwareExpert');
        $specialist->softwareExpert=$request->get('softwareExpert');
        $specialist->networkExpert=$request->get('networkExpert');
        $specialist->save();

        return redirect()->action('SpecialistsController@index', ['Success' => 'Specialist has been changed.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\specialists  $specialists
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialists $specialists)
    {
        //
    }
}
