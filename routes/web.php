<?php

use App\Http\Controllers\EtageController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntiteController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AppartementsController;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ArticleImagesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleHistoryController;
use App\Http\Controllers\Articles\ArticleContratsController;
use App\Http\Controllers\InventaireController;

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::get("/entite", [EntiteController::class, 'index'])->name("entite.index");
    Route::put("/entite", [EntiteController::class, 'update'])->name("entite.update");

    Route::resource('appartement', AppartementsController::class);
    Route::resource('direction', DirectionController::class);
    Route::resource('etage', EtageController::class);
    Route::resource('piece', PieceController::class);
    Route::resource('site', SiteController::class);
    Route::resource('bureau', BureauController::class);

    Route::resource("utilisateurs", UsersController::class);

    Route::resource('article', ArticleController::class);
    Route::get("/articles/{article}/images", [ArticleImagesController::class, "index"]);
    Route::post("/articles/{article}/images", [ArticleImagesController::class, "store"]);
    Route::delete("/articles/{article}/images/{articleImage}", [ArticleImagesController::class, "destroy"]);


    Route::post("/articles/{article}/contrats", [ArticleContratsController::class, "store"])->name("article.contrats.store");
    Route::get("/articles/{article}/contrats/create", [ArticleContratsController::class, "create"])->name("article.contrats.create");
    Route::get("/articles/{article}/contrats/{contrat}/edit", [ArticleContratsController::class, "edit"])->name("article.contrats.edit");
    Route::delete("/articles/{article}/contrats/{contrat}", [ArticleContratsController::class, "destroy"])->name("article.contrats.destroy");
    Route::put("/articles/{article}/contrats/{contrat}", [ArticleContratsController::class, "update"])->name("article.contrats.update");

    
    Route::get("/articles/{article}/historique/{historique}/edit", [ArticleHistoryController::class, "edit"])->name("article.historique.edit");
    Route::delete("/articles/{article}/historique/{historique}", [ArticleHistoryController::class, "destroy"])->name("article.historique.destroy");
    //Route to export data manually in differents formats (xsls, csv, pdf) and printing

    Route::get('/etage-export', [EtageController::class, 'excel'])->name('exports.etage.excel');
    Route::get('/etage-export-pdf', [EtageController::class, 'pdf'])->name('exports.etage.pdf');
    Route::get('/etage-export-print', [EtageController::class, 'print'])->name('exports.etage.print');
    Route::get('/site-export-excel', [SiteController::class, 'excel'])->name('exports.site.excel');
    Route::get('/site-export-pdf', [SiteController::class, 'pdf'])->name('exports.site.pdf');
    Route::get('/site-export-print', [SiteController::class, 'print'])->name('exports.site.print');

    Route::get('/article-export-excel', [ArticleController::class, 'excel'])->name('exports.article.excel');
    Route::get('/article-export-print', [ArticleController::class, 'print'])->name('exports.article.print');
    Route::get('/article-export-pdf', [ArticleController::class, 'pdf'])->name('exports.article.pdf');
    Route::get('/appartement-export-print', [AppartementsController::class, 'print'])->name('exports.appartement.print');
    Route::get('/appartement-export-excel', [AppartementsController::class, 'excel'])->name('exports.appartement.excel');
    Route::get('/appartement-export-pdf', [AppartementsController::class, 'pdf'])->name('exports.appartement.pdf');
    Route::get('/bureau-export-print', [BureauController::class, 'print'])->name('exports.bureau.print');
    Route::get('/bureau-export-excel', [BureauController::class, 'excel'])->name('exports.bureau.excel');
    Route::get('/bureau-export-pdf', [BureauController::class, 'pdf'])->name('exports.bureau.pdf');
    Route::get('/direction-export-print', [DirectionController::class, 'print'])->name('exports.direction.print');
    Route::get('/direction-export-excel', [DirectionController::class, 'excel'])->name('exports.direction.excel');
    Route::get('/direction-export-pdf', [DirectionController::class, 'pdf'])->name('exports.direction.pdf');
    Route::get('/piece-export-print', [PieceController::class, 'print'])->name('exports.piece.print');
    Route::get('/piece-export-excel', [PieceController::class, 'excel'])->name('exports.piece.excel');
    Route::get('/piece-export-pdf', [PieceController::class, 'pdf'])->name('exports.piece.pdf');
     //route for import
    Route::get('/import-form', [ArticleController::class, 'importForm'])->name('import.form');
    Route::post('/import', [ArticleController::class, 'import'])->name('import');

    //route for inventaire
    Route::get('/inventaire', [InventaireController::class, 'show'])->name('inventaire.show');
    Route::get('/inventaire-export-excel', [InventaireController::class, 'excel'])->name('exports.inventaire.excel');
    Route::get('/inventaire/preload', [InventaireController::class, 'preload'])->name('inventaire.preload');
    Route::post('/inventaire/post', [InventaireController::class, 'post'])->name('inventaire');

    //dynamic etage with site
    Route::post('/etage', [InventaireController::class, 'etage'])->name('etage');
    
    Route::post('/piece', [InventaireController::class, 'piece'])->name('piece');
});



