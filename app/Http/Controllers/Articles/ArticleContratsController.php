<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContratRequest;
use App\Models\Article;
use App\Models\Contrat;
use Illuminate\Http\Request;

class ArticleContratsController extends Controller
{
    public function create(Article $article)
    {
        return view("contrats.create", [
            "article" => $article,
            "contrat" => null
        ]);
    }

    public function store(ContratRequest $request, Article $article)
    {
        $article->contrats()->create($request->data());

        return redirect()->route("article.show", $article)->with("success", "Contrat crée avec succès");
    }

    public function edit(Article $article, Contrat $contrat)
    {
        return view("contrats.create", compact("contrat", "article"));
    }

    public function update(ContratRequest $request, Article $article, Contrat $contrat)
    {
        $contrat->update($request->data());

        return redirect()->route("article.show", $article)->with("success", "Contrat mis à jour avec succès");
    }

    public function destroy(Article $article, Contrat $contrat)
    {
        $contrat->delete();

        return redirect()->route("article.show", $article)->with("success", "Contrat supprimé avec succès");
    }

}
