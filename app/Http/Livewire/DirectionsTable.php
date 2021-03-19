<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Direction;
class DirectionsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
  
    protected $listeners = [
        "directionCreated" => '$refresh',
        "directionUpdated" => '$refresh'
    ];

    public $search = '';

    public function updatingSearch()
    {
        $this->reset();
    }
 
   
    public function edit($id){

        $this->emit("directionUpdating", $id);
        
    }
    public function render()
    {
        $directions = Direction::latest()->paginate(4);
        return view('livewire.directions-table',['directions' => $directions] );
    }
}
