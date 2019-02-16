<?php

namespace App\Http\Controllers;

use App\specialists;
use Illuminate\Http\Request;

class SpecialistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialists = specialists::all();
        return view('specialists.specialists', compact('specialists'));
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
    public function update(Request $request, specialists $specialists)
    {
        //
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
