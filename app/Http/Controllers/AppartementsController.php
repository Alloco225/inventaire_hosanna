<?php

namespace App\Http\Controllers;

use App\Exports\AppartementExport;
use App\Models\Appartement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AppartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appartement.index');
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
    public function destroy(Appartement $appartement)
    {
        $appartement->delete();

        return redirect()->back()->with("success", "L'appartement a été supprimé avec succès");
    }

    public function excel()
    {
        return Excel::download(new AppartementExport, 'appartements_'. now(). '_.xlsx');
    }
    public function pdf(){
        $appartements = Appartement::all();
        $pdf = PDF::loadView('exports.appartement', compact('appartements'));
        return $pdf->download('appartement_'.now()."_.pdf");
    }

    public function print(){
        $appartements = Appartement::all();
        $pdf = PDF::loadView('exports.appartement', compact('appartements'));
        return $pdf->stream('appartement.pdf');
    }
}
