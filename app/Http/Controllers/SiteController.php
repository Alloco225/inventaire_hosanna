<?php

namespace App\Http\Controllers;

use App\Exports\siteExport;
use App\Models\Appartement;
use App\Models\Article;
use App\Models\Etage;
use App\Models\Piece;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF ;
use Maatwebsite\Excel\Facades\Excel;



class SiteController extends Controller
{

    public function index()
    {
        $sites = Site::latest()->get();

        return view('site.index', compact("sites"));
    }


    public function show(Site $site)
    {
        return view("site.show", compact("site"));
    }

    public function destroy(Site $site)
    {
      

        $etages = Etage::where('site_id', $site->id)->get();

        foreach($etages as $etage){
            $pieces  = Piece::where('etage_id', $etage->id)->get();

            foreach($pieces as $piece){
                $piece->delete();
            }

            $appartements = Appartement::where('etage_id', $etage->id)->get();

            foreach($appartements as $appartement){
                $appartement->delete();
    
            }

            $articles = Article::where('etage_id', $etage->id)->get();

        
            foreach($articles as $article){
                $article->delete();
            }



            $etage->delete();

        }

        $site->delete();

        
        
        return redirect()->back()->with("success", "Le site a été supprimé avec succès");
    }

        public function excel()
    {
        return Excel::download(new siteExport, 'site_'.now().'_.xlsx');//csv
    }

    public function pdf(){
        $sites = Site::all();
        $pdf = PDF::loadView('exports.site', compact('sites'));
        return $pdf->download('site_'.now()."_.pdf");
    }

    public function print(){
        $sites = Site::all();
        $pdf = PDF::loadView('exports.site', compact('sites'));
        return $pdf->stream('site.pdf');
    }
}
