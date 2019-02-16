<?php

namespace App\Http\Controllers;

use App\logs;
use Illuminate\Http\Request;
use DateTime;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = logs::all();
        return view('logs.logs', compact('logs'));
        //Return logs table view with name of route.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('logs.new');
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
            'caller'=>'required',
            'operator'=> 'required',
            'hardwareSN' => 'required',
            'OS' => 'required',
            'software' => 'required'
        ]);
        
        $now = new DateTime();
        $log = new logs([
            'caller' => $request->get('caller'),
            'operator'=> $request->get('operator'),
            'hardwareSN'=> $request->get('hardwareSN'),
            'OS'=> $request->get('OS'),
            'software' => $request->get('software'),
        ]);

        $log->save();
        return redirect()->action('LogsController@index',['Success' => 'Log has been added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function show(logs $logs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function edit(logs $logs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, logs $logs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs $logs)
    {
        //
    }
}
