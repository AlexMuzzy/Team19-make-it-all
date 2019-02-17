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
            'employeeID' => 'required',
            'fname'=>'required',
            'sname'=> 'required',
            'category' => 'required',
            'issue' => 'required',
            'priority' => 'required',
            'summary' => 'required'
          ]);

          $case = new cases([
            'employeeID' => $request->get('employeeID'),
            'fname' => $request->get('fname'),
            'sname'=> $request->get('sname'),
            'category'=> $request->get('category'),
            'issue'=> $request->get('issue'),
            'priority'=> $request->get('priority'),
            'summary' => $request->get('summary'),
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
    public function edit($id)
    {
        //
        $case = Cases::find($id);

        return view('cases.edit', compact('case'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'fname'=>'required',
            'sname'=> 'required',
            'category' => 'required',
            'issue' => 'required',
            'priority' => 'required',
            'solved' => 'required',
            'summary' => 'required'
        ]);
        
        $case = Cases::find($id);
        $case->fname=$request->get('fname');
        $case->sname=$request->get('sname');
        $case->category=$request->get('category');
        $case->issue=$request->get('issue');
        $case->priority=$request->get('priority');
        $case->solved=$request->get('solved');
        $case->summary=$request->get('summary');
        
        $case->save();

        return redirect()->action('CasesController@index',['Success' => 'Case has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $case = Cases::find($id);
        $case->delete();

        return redirect()->action('CasesController@index',['Success' => 'Case has been deleted.']);
    }
}
