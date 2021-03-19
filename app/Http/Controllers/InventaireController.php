<?php

namespace App\Http\Controllers;

use App\Exports\ArticleInventaireExport;
use App\Models\Article;
use App\Models\Etage;
use App\Models\Etat;
use App\Models\Inventaire;
use App\Models\MouvementHistory;
use App\Models\Piece;
use App\Models\Site;
use App\Models\StateHistory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InventaireController extends Controller
{
    public function show(){
        return view('inventaire.index');
    }

    public function etage(Request $request){
        $site_id = $request->site_id;

        $etages = Etage::where('site_id', $site_id)->get();

        return response()->json([
            'etages' =>$etages 
        ]);
    }  


    public function piece(Request $request){
        $etage_id = $request->etage_id;

        $pieces = Piece::where('etage_id', $etage_id)->get();

        return response()->json([
            'pieces' =>$pieces 
        ]);
    }  





    public function preload(){

        $inventaires = Inventaire::where('is_treated', 0)->get();
        foreach($inventaires as $inventaire){
            $article = Article::where('code_barre', $inventaire->article_code_barre)->first();
            
            $inventaire->update([
                'article_id' => $article->id
            ]) ;
            }
        return view('inventaire.preload', ['inventaires' => Inventaire::where('is_treated', 0)->get(), 'sites' => Site::all(), 'etats'=>Etat::all(), 'pieces'=>Piece::all()
        , 'etages' => Etage::all()
        ]);
    }

    public function post(Request $request ){


        /*$article = Article::where('code_barre', $request->data[1])->get();
        $article->update([
            'etat_id' => $request->data[2],
            'quantite' => $request->data[3],
            'site_id' => $request->data[4],
            'etage_id' =>$request->data[5],
            'piece_id' =>$request->data[6]
        ]);*/


        $nb = (count($request->data)-1)/8 ;

        for($i=0; $i<$nb; $i++){
      
            $article = Article::where('code_barre', $request->data[$i*8+1]['value'])->first();
            $inventaire= Inventaire::where('numero_inventaire', $request->data[$i*8+8]['value'])->first();
            $etat_new = Etat::where('id', $request->data[$i*8+3]['value'])->first();

            if(empty($article)){
                return 0;
            }

            if(empty($inventaire)){
                return 0;
            }

            $inventaire->update(
                [
                    'is_treated' => 1
                ]
                );

            StateHistory::create(
                [
                    'article_id' =>  $article->id ,
                    'libelle' => $etat_new->libelle,
                    'old_state' => $article->etat->libelle ?? ''
                ]
            );

            $site = Site::where('id', $request->data[$i*8+5]['value'])->first();
            $piece = Piece::where('id', $request->data[$i*8+7]['value'])->first();
            $old_site = $article->site->nom_site;
            $old_piece = $article->piece->nom_piece ?? "";

            MouvementHistory::create(
                [
                    'article_id' =>  $article->id ,
                    'libelle' => "Chgt .Pièce </br> Site prec : $old_site </br> Piece prec : $old_piece </br>",
                    'old_quantity' => $article->quantite,
                    'diff_quantity' =>floatval($article->quantite) - floatval($request->data[$i*8+4]['value']) ,

                    'observation'=> "ras"
                ]
            );

          
            $a = $article->update([
                'observation' => $request->data[$i*8+2]['value'],
                'etat_id' => $request->data[$i*8+3]['value'],
                'quantite' => $request->data[$i*8+4]['value'],
                'site_id' => $request->data[$i*8+5]['value'],
                'etage_id' =>$request->data[$i*8+6]['value'],
                'piece_id' =>$request->data[$i*8+7]['value'],
                'numero_inventaire' => $request->data[$i*8+8]['value']
            ]);


            

        }

        return response()->json([
            'data' => $article,
        ]);
        

    }
    public function excel()
    {
        return Excel::download(new ArticleInventaireExport, 'Inventaire_'. now(). '_.xlsx');
    }
}
