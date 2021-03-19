<?php

namespace App\Http\Livewire;

use App\Models\Etage;
use App\Models\Piece;
use Livewire\Component;

class PieceEtage extends Component
{
    public $etage, $etage_id, $piece, $pieceId, $click;
    protected $listeners = [
         "etageSelected" => "handleEtageSelected",
         "pieceCreated" => '$refresh',
         "pieceUpdated"=> '$refresh',
         'delete_piece'=>'$refresh'
    ];

    public function handleEtageSelected(Etage $etage)
    {
        
        $this->etage = $etage;
        $this->etage_id = $etage->id;
    }
  
    public function edit($id){
        $this->emit('add_piece', $id);
    }

    public function  editPiece($id){
        $this->emit('update_piece', $id);
    }
   
    public function delete($piece){

       

        $piece = Piece::whereId($piece)->get()->first();
        $piece->delete();
        $this->emit('delete_piece');
        request()->session()->flash(
            'success',
            'les articles ont été ajoutés avec succès.'
        );
    }



   
    
    public function pieceSelected($piece)
    {
        $this->emit("pieceSelected", $piece);
        $this->click = $piece['id'];
    }
   

    public function render()
    {
        
        if($this->etage) {
            $pieces = Piece::whereEtageId($this->etage->id)->paginate(10);
        }  else {
            $pieces = [];
        }

     

        $etage_id = $this->etage_id;
       
        return view('livewire.piece-etage', compact("pieces", "etage_id"));
    }
}