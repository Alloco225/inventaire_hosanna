<?php

namespace App\Http\Controllers;

use App\Exports\BureauExport;
use App\Models\Bureau;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bureaux = Bureau::latest()->get();
        return view('bureau.index', compact('bureaux'));
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

    public function excel()
    {
        return Excel::download(new BureauExport, 'bureaux_'. now(). '_.xlsx');
    }
    public function pdf(){
        $bureaux = Bureau::all();
        $pdf = PDF::loadView('exports.bureau', compact('bureaux'));
        return $pdf->download('bureau_'.now()."_.pdf");
    }

    public function print(){
        $bureaux = Bureau::all();
        $pdf = PDF::loadView('exports.bureau', compact('bureaux'));
        return $pdf->stream('bureau.pdf');
    }

}
