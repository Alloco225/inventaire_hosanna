<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Piece;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleTableOld extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $piece,$piece_id, $click = null;

    protected $listeners = [
        "pieceSelected" => "handlePieceSelected",
    ];

    public $search = '';

    public function updatingSearch()
    {
        $this->reset();
    }

    public function addingArticle($id){
        $this->emit('addingArticle', $id);
    }
    

    public function handlePieceSelected(Piece $piece){
        $this->piece= $piece;
        $this->piece_id = $piece->id;
    }


    public function render()
    {
        $articles= Article::with("piece")->latest();
        if($this->piece) {
            $articles= $articles->wherePieceId($this->piece->id);
        }
        return view('livewire.article-table', ['articles' => $articles->paginate(1)]);
    }
}
