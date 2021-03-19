<?php

namespace App\Exports;

use App\Models\Etage;
use App\Models\Site;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class siteExport implements FromView
{
   
    public function view(): View
    {
        return view('exports.site', [
            'sites' => Site::all()
        ]);
    }
}
