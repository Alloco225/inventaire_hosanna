<?php

namespace App\Http\Livewire;

use App\Models\Bureau;
use App\Models\Categorie;
use App\Models\Direction;
use App\Models\Etage;
use App\Models\Piece;
use App\Models\Site;
use App\Models\SousCategorie;
use Livewire\Component;

class ArticleFormOld extends Component
{
    use ModalHandler;
    public $piece , $pieceId,  $title = "Ajouter un article";
    public $etages, $directions, $bureaux, $sites, $categories, $sous_categories;

    protected $listeners = [
        "addingArticle"
    ];

    private function clearForm()
    {
       
    }

    
    public function addingArticle($id){
        $this->pieceId = $id;
    }
    public function render()
    {
        $this->pieces = Piece::all();
        $this->etages = Etage::all();
        $this->sites = Site::all();
        $this->bureaux = Bureau::all();
        $this->directions = Direction::all();
        $this->categories = Categorie::all();
        $this->sous_categories = SousCategorie::all();

        
        return view('livewire.article-form',['pieces' => $this->pieces, 'etages'=> $this->etages,
         'sites' =>$this->sites,
         'bureaux' => $this->bureaux,
         'directions'=>$this->directions,
         'categories' => $this->categories,
         
         'sous_categroies' => $this->sous_categories
        
        
        ]);
    }
}
