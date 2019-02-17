<?php

namespace App\Http\Controllers;

use App\hardware;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hardware = hardware::all();
        return view('hardware.hardware', compact('hardware'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hardware.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'hardware'=>'required',
            'hardwareSN'=> 'required',
            'type' => 'required',
            'vendor' => 'required'
        ]);
        
        $row = new hardware([
            'hardware' => $request->get('hardware'),
            'hardwareSN'=> $request->get('hardwareSN'),
            'type'=> $request->get('type'),
            'vendor'=> $request->get('vendor')
        ]);

        $row->save();
        return redirect()->action('HardwareController@index',['Success' => 'Hardware has been added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function show(hardware $hardware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $hardware = hardware::find($id);

        return view('hardware.edit', compact('hardware'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'hardware'=>'required',
            'hardwareSN'=>'required',
            'type'=> 'required',
            'vendor' => 'required'
        ]);
        $row = hardware::find($id);
        $row->hardware=$request->get('hardware');
        $row->hardwareSN=$request->get('hardwareSN');
        $row->type=$request->get('type');
        $row->vendor=$request->get('vendor');

        $row->save();
        return redirect()->action('HardwareController@index',['Success' => 'Hardware has been added.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hardware = hardware::find($id);
        $hardware->delete();

        return redirect()->action('hardwareController@index',['Success' => 'hardware has been deleted.']);
    }
}
