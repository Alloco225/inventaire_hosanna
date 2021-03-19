<?php

namespace App\Http\Livewire;

use App\Models\Etage;
use App\Models\Piece;
use App\Models\Site;
use Livewire\Component;

class PieceFormUpdate extends Component
{
    use ModalHandler;
    public $title = "Modifier la piece";
    public $sites;
    public $nom_piece;
    public $piece;
    public $pieceId;
    public $etageId;
    public $etage;
    public $nb_fenetre, $code_barre, $numero_porte, $surface;
   

    protected $listeners = [
        'update_piece'=> "pieceUpdating"
    ];

    public function pieceUpdating($id){

        $this->piece = Piece::where('id', $id)->get()->first();
        $this->nom_piece = $this->piece->nom_piece;
        $this->etageId = $this->piece->etage->id;
        $this->pieceId = $this->piece->id;
        $this->nb_fenetre = $this->piece->nb_fenetre;
        $this->code_barre = $this->piece->code_barre;
        $this->numero_porte = $this->piece->numero_porte;
        $this->surface = $this->piece->surface;
    }

    public function updatePiece($id): void
    {

        $validatedData = $this->validate([
            "nom_piece" => "required",
            "code_barre" => "required|integer",
            "nb_fenetre"   => "required",
            "surface" => "required",
            "numero_porte" => 'required|integer',
           
        ]);

        $piece = Piece::where('id', $id);

        $validatedData['etage_id'] = $this->etageId;
     



        $piece->update($validatedData);

        $this->clearForm();
        $this->closeModal();
        $this->emit("pieceUpdated");

        session()->flash("success", "La piece a été modifié avec succès");
    }


    private function clearForm()
    {
        $this->nom_piece = "";
        $this->code_barre = "";
        $this->nb_fenetre = "";
        $this->surface = "";
        $this->numero_porte = "";
        $this->etageId = "";
     
    }
    public function render()
    {
        
        $this->etages = Etage::latest()->get();
        return view('livewire.piece-form-update', ['etages' => $this->etages]);
    }
}