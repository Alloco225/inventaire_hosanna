<?php

namespace App\Exports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ArticleExport implements FromView
{
    public function view():View
    {
        return view('exports.article', ['articles'=>Article::all()]);
    }
}
