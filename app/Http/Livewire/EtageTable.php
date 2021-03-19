<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Etage;
use Livewire\WithPagination;
class EtageTable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $site, $click = null;

    protected $listeners = [
        "etageCreated" => '$refresh',
        "etageUpdated" => '$refresh',
        "pieceCreated" => '$refresh'
    ];

    public $search = '';

    public function updatingSearch()
    {
        $this->reset();
    }

    public function edit($id)
    {
        $this->emit("etageUpdating", $id);
    }

    public function etageSelected($etage)
    {
       
        $this->emit("etageSelected", $etage);
        $this->click = $etage['id'];
    }

    public function render()
    {
        $etages = Etage::with("site")->latest();
        if($this->site) {
            $etages = $etages->whereSiteId($this->site->id);
        }

        return view('livewire.etage-table', ['etages' => $etages->paginate(4)]);
    }
}
