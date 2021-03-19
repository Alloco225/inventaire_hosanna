<?php

namespace App\Http\Controllers;

use App\Imports\ArticleImport;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Rules\ExcelRule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArticleExport;
use PDF;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index', ['articles'=>Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(Article $article)
    {
        $article->load('contrats');

        return view('article.show', compact("article"));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with("success", "L'article a été supprimé avec succès");
    }

    public function ImportForm(){
        return view('imports.import-form');
    }


    public function import(Request $request){


        


      /*   $request->validate(
            [
                'file' => ['required', new ExcelRule($request->file)]
            ]
            );

            
        Excel::import(new ArticleImport, $request->file); */

        return redirect('/article');

    }

    public function excel()
    {
        return Excel::download(new ArticleExport, 'Articles_'. now(). '_.xlsx');
    }
    public function pdf(){
        $articles = Article::all();
        $pdf = PDF::loadView('exports.article', compact('articles'));
        return $pdf->download('article_'.now()."_.pdf");
    }

    public function print(){
        $articles = Article::all();
        $pdf = PDF::loadView('exports.article', compact('articles'));
        return $pdf->stream('article.pdf');
    }
}
