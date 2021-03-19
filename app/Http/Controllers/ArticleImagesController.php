<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\{Article, ArticleImage};

class ArticleImagesController extends Controller
{
    public function index(Article $article)
    {
        $images = ArticleImage::whereArticleId($article->id)->get(["id", "path"]);

        return response()->json(compact("images"), 200);
    }

    public function store(Request $request, Article $article)
    {
        $imageFile = request()->file("image");
        $imageName = Str::random(20) . "." . $imageFile->getClientOriginalExtension();

        $image = ArticleImage::create([
            "article_id" => $article->id,
            "path" => $imageName
        ]);

        $imageFile->storeAs("images/articles", $imageName, "public_folder");

        return response()->json([
            "id"  => $image->id,
            "link" => $image->link 
        ], 201);

    }

    public function destroy($article, ArticleImage $articleImage)
    {
        $articleImage->delete();

        Storage::disk("public_folder")->delete("images/articles/" . $articleImage->path);
    
        return response()->json([], 204);
    }
}
