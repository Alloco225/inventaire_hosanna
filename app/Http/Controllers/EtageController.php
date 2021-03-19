<?php

namespace App\Http\Controllers;

use App\Exports\etageExport;
use App\Exports\siteExport;
use App\Models\Appartement;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Etage;
use App\Models\Piece;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class EtageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etages = Etage::latest()->get();


        return view('etage.index', compact("etages"));
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
    public function destroy(Etage $etage)
    {
        $etage->delete();

        $appartements = Appartement::where('etage_id', $etage->id)->get();

        foreach($appartements as $appartement){
            $appartement->delete();

        }

        $articles = Article::where('etage_id', $etage->id)->get();

        
        foreach($articles as $article){
            $article->delete();
        }

        $pieces  = Piece::where('etage_id', $etage->id)->get();

        foreach($pieces as $piece){
            $piece->delete();
        }
        
        return redirect()->back()->with("success", "L'etage a été supprimé avec succès");
        
    }

    public function excel() 
    {
        return Excel::download(new etageExport, 'etages_'. now(). '_.xlsx');
    }
    public function pdf(){
        $etages = Etage::all();
        $pdf = PDF::loadView('exports.etage', compact('etages'));
        return $pdf->download('etage_'.now()."_.pdf");
    }

    public function print(){
        $etages = Etage::all();
        $pdf = PDF::loadView('exports.etage', compact('etages'));
        return $pdf->stream('etage.pdf');
    }
    
}
