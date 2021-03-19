<?php

namespace App\Http\Livewire;

use App\Models\Etage;
use App\Models\Piece;
use App\Models\Site;
use Livewire\Component;

class SiteDetails extends Component
{
    public $etageId = null;
    public $etage = null;
    public $site = null;
    public $piece = null;
    public $pieceId = null;

    protected $listeners = [
        "showSite" => "show",
        "etageSelected" => "showEtageDetails",
        "pieceCreated" => '$refresh',
        'pieceSelected'=> 'showPieceDetails',
        'delete_piece'=> '$refresh'
    ];

    public function show(Site $site): void
    {
        $this->site = $site;
    }

    public function showEtageDetails(Etage $etage)
    {
        $this->etageId = $etage->id;
        $this->etage = $etage;
    }


    public function showPieceDetails(Piece $piece)
    {
        $this->pieceId = $piece->id;
        $this->piece = $piece;
    }

    public function render()
    {
        return view('livewire.site-details');
    }

}
