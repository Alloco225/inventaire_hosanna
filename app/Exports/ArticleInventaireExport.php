<?php

namespace App\Exports;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArticleInventaireExport implements FromView
{
   
    public function view(): View
    {
        return view('exports.article-inventaire', ['articles'=>Article::all()]);
    }
}
