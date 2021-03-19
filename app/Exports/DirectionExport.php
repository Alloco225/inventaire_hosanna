<?php

namespace App\Exports;

use App\Models\Direction;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DirectionExport implements FromView
{
    public function view():View
    {
        return view('exports.direction', ['directions'=>Direction::all()]);
    }
}
