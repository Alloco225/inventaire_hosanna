<?php

namespace App\Http\Livewire;

use App\Models\Appartement;
use App\Models\Etage;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class AppartementsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        "appartementCreated" => '$refresh',
        "appartementUpdated" => '$refresh'
    ];

    public $search = '';
    public $site;

    public function updatingSearch()
    {
        $this->reset();
    }


    public function edit($id){

        $this->emit("appartementUpdating", $id);

    }
    public function render()
    {
        return view('livewire.appartements-table', ['appartements' => $this->getData()]);
    }

    protected function getData(): LengthAwarePaginator
    {
        $appartements = Appartement::latest();

        if($this->site) {
            $siteEtageIds = Etage::where("site_id", $this->site->id)
                                ->pluck("id")
                                ->toArray();
            $appartements = $appartements->whereIn("etage_id", $siteEtageIds);
        }

        return $appartements->paginate(4);
    }
}
