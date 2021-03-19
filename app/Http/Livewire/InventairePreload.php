<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Inventaire;
use App\Models\Site;
use Livewire\Component;

class InventairePreload extends Component
{
    public $site_id,$etage_id, $piece_id, $observation, $quantity;

   

    public function mount(){
        $inventaires = Inventaire::where('is_treated', 0)->get();
        foreach($inventaires as $inventaire){
            $article = Article::where('code_barre', $inventaire->article_code_barre)->first();
            
            $inventaire->update([
                'article_id' => $article->id
            ]) ;



        
        }

       
    }
    public function render()
    {
        return view('livewire.inventaire-preload', ['inventaires' => Inventaire::where('is_treated', 0)->get(), 'sites' => Site::all()]);
    }
}
