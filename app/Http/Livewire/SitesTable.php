<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;
class SitesTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function updatingSearch()
    {
        $this->reset();
    }

    protected $listeners = [
        "siteCreated" => '$refresh',
        "siteUpdated" => '$refresh'
    ];

    public function showSite(Site $site)
    {
        $this->emit("showSite", $site);
    }

    public function edit($id)
    {
        $this->emit("siteUpdating", $id);
    }

    public function render()
    {
        $sites = Site::withCount("etages")->latest()->paginate(4);

        return view('livewire.sites-table', ['sites'=> $sites] );
    }
}
