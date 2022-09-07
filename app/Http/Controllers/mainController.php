<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\rows;

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


        public function table()
    {
        //
        return view('myApp.table');
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
    
    public function savetable(Request $request) {
        if(count($request['newData']) > 1) {
            foreach ($request['newData'] as $item) {
                # code...
                rows::create([
                    'row' => $item,
                    'i_user' => Auth::user()->id,
                ]); 
            }} 
        else {
            rows::create([
                'row' => $request['newData'][0],
                'i_user' => Auth::user()->id,
            ]);
        }
        return redirect()->route('main');

    }
}
