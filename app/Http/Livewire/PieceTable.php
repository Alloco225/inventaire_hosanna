<?php

namespace App\Http\Livewire;

use App\Models\Piece;
use Illuminate\Queue\Listener;
use Livewire\Component;

class PieceTable extends Component
{
    protected $listeners = [
        "pieceCreated" => '$refresh',
        "pieceUpdated" => '$refresh'
    ];

    public function edit($id)
    {
        $this->emit("pieceUpdating", $id);
    }

    public function render()
    {
        return view('livewire.piece-table', ['pieces' =>Piece::all()]);
    }
}