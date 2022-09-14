<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\rows;
use App\Models\table;

class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $columns = DB::table('columns')
                ->where('i_user',Auth::user()->id)
                ->get();
        $rows = DB::table('rows')
                ->where('i_user',Auth::user()->id)
                ->get();


        return view('myApp.main',compact('columns' , 'rows'));
    }


        public function table(Request $request)
    {
        //
        $test = $request->_date ? $request->_date : date("Y-m-d", time());
        $data = DB::table('tables')
                ->where('i_user', Auth::user()->id)
                ->where('created_at','like', date("Y-m-d", time()) . '%')
                ->get();
        
        return view('myApp.table',compact('data'));
        // return date("Y-m-d", time());
    }

    public function Chtable(Request $request)
    {
        //
        $date = $request->_date ? $request->_date : date("Y-m-d", time());
        $data = DB::table('tables')
                ->where('i_user', Auth::user()->id)
                ->where('created_at','like', $date . '%')
                ->get();
        
        // return redirect()->route('table', ['data' => $data]);
        // return view('myApp.table',compact('data'));
        return response()->json([
            'data' => $data,
        ]);

        // return $data;
    }

    
        public function insTodoList(Request $request)
    {
        //
        // dd($request['todo_list']);
            foreach ($request['todo_list'] as $item) {
                # code...
                table::create([
                    'todo_list' => $item,
                    'i_user' => Auth::user()->id,
                ]); 
            }
        return redirect()->route('table');

    }

            public function brickBreaker()
    {

        
        return view('myApp.brickBreaker');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function delTodoList(Request $request)
    {
        //
        $delList = DB::table('tables')
        ->where('i_todo_list',$request->i_todo_list)
        ->where('i_user',Auth::user()->id)
        ->delete();

        return $delList;
    }
    
    public function savetable(Request $request) {
            foreach ($request['newData'] as $item) {
                # code...
                rows::create([
                    'row' => $item,
                    'i_user' => Auth::user()->id,
                ]); 
            }
        return redirect()->route('main');
    }
}
