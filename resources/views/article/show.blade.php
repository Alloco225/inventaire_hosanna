@extends('layouts.app')

@section("content")
    <x-subheader title="Gestion des Articles" subtitle="Fiche article"/>
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h2 class="card-label">
                        <span class="font-weight-bold">Fiche article</span> | {{ ucfirst($article->nom) }}
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-line">
        
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_7">Achat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Historique Etat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3">Historique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4">Documents / Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_5">Contrats</a>
                    </li>
                </ul>
                <div class="tab-content mt-5" id="myTabContent">
                    
                    <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel" aria-labelledby="kt_tab_pane_7">Tab content achat</div>
                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                    @include("article.components.historique-etat", ["article" => $article])
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">
                    @include("article.components.historique", ["article" => $article])
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_4">
                        <article-image :article-id="{{ $article->id }}"></article-image>
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel" aria-labelledby="kt_tab_pane_5">
                        @include("article.components.contrat", ["article" => $article])
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
