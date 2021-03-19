<?php

namespace App\Exports;

use App\Models\Bureau;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BureauExport implements FromView
{
    public function view():View
    {
        return view('exports.bureau', ['bureaux'=>Bureau::all()]);
    }
}
