<?php

namespace App\Http\Livewire;

use App\Models\Bureau;
use Livewire\Component;

class BureauxTable extends Component
{
    public function render()
    {
        $bureaux = Bureau::latest()->paginate(4);
        return view('livewire.bureaux-table', compact('bureaux'));
    }
}
