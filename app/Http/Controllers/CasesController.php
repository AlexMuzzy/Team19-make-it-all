<?php

namespace App\Http\Controllers;

use App\cases;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = cases::all();
        return view('cases.cases', compact('cases'));
        //Return cases table view with name of route.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cases.new');
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
            'category' => 'required',
            'issue' => 'required',
            'priority' => 'required',
            'summary' => 'required'
          ]);
          $case = new cases([
            'fname' => $request->get('fname'),
            'sname'=> $request->get('sname'),
            'category'=> $request->get('category'),
            'issue'=> $request->get('issue'),
            'priority'=> $request->get('priority'),
            'summary'=> $request->get('summary'),
            'description' => $request->get('description'),
            'solved' => $request->get('solved')
          ]);
          $case->save();
          return redirect()->action('CasesController@index',['Success' => 'Case has been added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show(cases $cases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit(cases $cases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cases $cases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy(cases $cases)
    {
        //
    }
}
