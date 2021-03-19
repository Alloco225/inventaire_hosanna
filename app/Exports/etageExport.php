<?php

namespace App\Exports;

use App\Models\Etage;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class etageExport implements FromView
{
    
    public function view(): View
    {
        return view('exports.etage', [
            'etages' => Etage::all()
        ]);
    }
}
