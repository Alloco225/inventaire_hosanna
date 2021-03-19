<?php

namespace App\Exports;

use App\Models\Appartement;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class AppartementExport implements FromView
{
    public function view():View
    {
        return view('exports.appartement', ['appartements'=>Appartement::all()]);
    }
}
