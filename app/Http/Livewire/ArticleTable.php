<?php

namespace App\Http\Livewire;

use App\Models\Site;
use App\Models\Etage;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Piece;
use App\Models\SousCategorie;
use Livewire\Component;
use Livewire\WithPagination;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ArticleTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $site_id;
    public $etage_id=null;
    public $piece_id=null;
    public $etages;
    public $pieces;
    public $article_tab=[];
    //varible for editing

    public $sites_edit,$site_edit,$piece_edit, $pieces_edit, $etage_edit, $etages_edit;
    public $categorie_edit,$categories_edit, $sous_categorie_edit, $sous_categories_edit;

    
    public function mount()
    {
        $this->sites_edit= Site::all();
        $this->categories_edit =Categorie::all();
        $this->etages = Etage::all();
        $this->pieces =  Piece::all();
       
    }

    protected $listeners = [
        "ArticleCreated" => '$refresh',
        "articleUpdated" => '$refresh'
    ];

    public function updatedCategorieEdit($id)
    {
       
        $this->sous_categories_edit = SousCategorie::where('id_category', $id)->get();
    }
   
    public function updatedSiteEdit($id)
    {
       
        $this->etages_edit = Etage::where('site_id', $id)->get();
    }

    public function updatedEtageEdit($id)
    {
       
        $this->pieces_edit = Piece::where('etage_id', $id)->get();
    }
   
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPieceId()
    {
        $this->resetPage();
    }
    public function updatedSiteId($id)
    {
        $this->site_id=$id;
        $this->etages = Etage::where('site_id', $id)->get();
    }

    public function updatedEtageId($id)
    {
        $this->etage_id=$id;
        $this->pieces = Piece::where('etage_id', $id)->get();
    }

   

    public function showArticle(Article $article)
    {
        $this->emit("showArticle", $article);
    }

    public function edit($id)
    {
        $this->emit("articleUpdating", $id);
    }

    public function transfert(){

     
        

        if(!empty($this->categorie_edit))
        {
   
            $this->validate(
                [
                    'sous_categorie_edit' => 'required',
                    
                ]
                );
        }

        if(!empty($this->site_edit))
        {
   
            $this->validate(
                [
                    'piece_edit' => 'required',
                    
                ]
                );
        }
       $articles = Article::whereIn('id',$this->article_tab)->get();


       
       foreach($articles as $article){
           $etageId = empty($this->etage_edit)? $article->etage_id : $this->etage_edit; 
           

          
            $article->update(
                [
                    'site_id' => empty($this->site_edit)? $article->site_id : $this->site_edit,
                    'etage_id' => $etageId,
                    'piece_id' => empty($this->piece_edit)?  $article->piece_id : $this->piece_edit,
                    'category_id' => empty($this->categorie_edit)?  $article->category_id : $this->categorie_edit,
                    'sous_categorie_id' => empty($this->sous_categorie_edit)?  $article->sous_categorie_id : $this->sous_categorie_edit
                ]
                );
    
    
       }

       request()->session()->flash(
        'success',
        'les articles ont été ajoutés avec succès.'
    );

       return redirect()->back()->with('success', 'articles transférés avec succèss');
    }

    public function render()
    {
        
       
        return view('livewire.article-table', ['articles'=>Article::where('nom', 'like', '%'.$this->search.'%')
        ->when($this->piece_id, function($query) {
            return $query->where('piece_id', $this->piece_id);
        })
        ->when($this->etage_id, function($query) {
            return $query->where('etage_id', $this->etage_id);
        })
        ->when($this->site_id, function($query) {
            return $query->where('site_id', $this->site_id);
        })
        ->paginate(4), 
        
        'sites'=> Site::all()]);

       
        
    }
}
