<?php

namespace App\Http\Controllers;

use App\cases;
use App\specialists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;


class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
            $assignedToVal = 0;
            $specialist = new specialists([]);
            if($request->get('solved') == 'No'){
                if ($request->get('category') == 'Hardware'){
                    $data = DB::table('specialists')
                    ->where('hardwareExpert','=',1)
                    ->orderBy('assignedCases', 'asc')
                    ->first();
                } else if ($request->get('category') == 'Software'){
                    $data = DB::table('specialists')
                    ->where('softwareExpert','=',1)
                    ->orderBy('assignedCases', 'asc')
                    ->first();
                } else if ($request->get('category') == 'Networking'){
                    $data = DB::table('specialists')
                    ->where('networkExpert','=',1)
                    ->orderBy('assignedCases', 'asc')
                    ->first();
                }
                $assignedToVal = $data->id;
                $specialist = specialists::find($assignedToVal);
                $newval = $specialist->assignedCases;
                $specialist->assignedCases=$newval+1;
                $specialist->save();
            }
        $case = new cases([
        'employeeID' => $request->get('employeeID'),
        'fname' => $request->get('fname'),
        'sname'=> $request->get('sname'),
        'category'=> $request->get('category'),
        'issue'=> $request->get('issue'),
        'priority'=> $request->get('priority'),
        'summary' => $request->get('summary'),
        'solved' => $request->get('solved'),
        'solvedtext' => $request->get('solvedtext'),
        'assignedTo' => $assignedToVal
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
        /*
        if($request->get('solved') == 1){
            $request->validate([
                'solvedtext' => 'required'
            ]);
        }
        */
        $request->validate([
            'employeeID' => 'required',
            'fname'=>'required',
            'sname'=> 'required',
            'category' => 'required',
            'issue' => 'required',
            'priority' => 'required',
            'solved' => 'required',
            'summary' => 'required',
        ]);
        
        
        $case = Cases::find($id);
        /*
        $specialist = new specialists;
        $specialist = specialists::find($request->get('assignedTo'));
        $specialsolvedval = $specialist->solvedCases;
        if ($case->solved == 0){
            if($request->get('solved')){
                $data = DB::table('specialists')
                    ->where('id','=',$request->get('assignedTo'))
                    ->get();
                $special->solvedCases=$specialsolvedval+1;
                $specialist->save();
            }

        }
        */
        $case->employeeID=$request->get('employeeID');
        $case->fname=$request->get('fname');
        $case->sname=$request->get('sname');
        $case->category=$request->get('category');
        $case->issue=$request->get('issue');
        $case->priority=$request->get('priority');
        $case->solved=$request->get('solved');
        $case->summary=$request->get('summary');
        $case->assignedTo=$request->get('assignedTo');
        $case->solvedtext=$request->get('solvedtext');
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
