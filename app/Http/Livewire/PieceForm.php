<?php

namespace App\Http\Livewire;

use App\Models\Etage;
use App\Models\Piece;
use Livewire\Component;

class PieceForm extends Component
{
    use ModalHandler;
    public $title = "Ajouter une piece";
    public  $nom_piece,
    $code_barre ,
    $nb_fenetre ,
    $surface ,
    $numero_porte ,
    $etage_id , $etages,$etage =null;


    protected $listeners = [
        "add_piece",
        "pieceCreated" => '$refresh'
    ];


    public function add_piece($id){
        $this->etage_id = $id;
    }

    public function createPiece()
    {

        $validatedData = $this->validate([
            "nom_piece" => "required",
            "code_barre" => "required|integer",
            "nb_fenetre"   => "required",
            "surface" => "required",
            "numero_porte" => 'required|integer',
          
        ]);

        $validatedData['etage_id'] = $this->etage_id;
     



        $piece = Piece::create($validatedData);

        $this->clearForm();
        $this->closeModal();
        $this->emit("pieceCreated");



        session()->flash("success", "La piece a été créé avec succès");

        
    }

    private function clearForm()
    {
        $this->nom_piece = "";
        $this->code_barre = "";
        $this->nb_fenetre = "";
        $this->surface = "";
        $this->numero_porte = "";
        $this->etage_id = "";
     
    }

    public function render()
    {
        $this->etages = Etage::latest()->get();
        return view('livewire.piece-form', ['etages' => $this->etages]);
    }
   
}
