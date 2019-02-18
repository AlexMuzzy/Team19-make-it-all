<?php

namespace App\Http\Controllers;

use App\software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $software = software::all();
        return view('software.software', compact('software'));
        //Return software table view with name of route.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('software.new');
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
            'vendor'=>'required',
            'software'=>'required',
            'licensed'=> 'required',
            'supported' => 'required'
        ]);
        
        $row = new software([
            'vendor' => $request->get('vendor'),
            'software' => $request->get('software'),
            'licensed'=> $request->get('licensed'),
            'supported'=> $request->get('supported')
        ]);

        $row->save();
        return redirect()->action('SoftwareController@index',['Success' => 'Software has been added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\software  $software
     * @return \Illuminate\Http\Response
     */
    public function show(software $software)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\software  $software
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $software = software::find($id);
        return view('software.edit', compact('software'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\software  $software
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'software'=>'required',
            'licensed'=> 'required',
            'supported' => 'required'
        ]);
        $row = software::find($id);
        $row->software=$request->get('software');
        $row->supported=$request->get('supported');
        $row->licensed=$request->get('licensed');

        $row->save();
        return redirect()->action('SoftwareController@index',['Success' => 'Software has been added.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\software  $software
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $row = software::find($id);
        $row->delete();

        return redirect()->action('SoftwareController@index',['Success' => 'Software has been deleted.']);
    }
}
