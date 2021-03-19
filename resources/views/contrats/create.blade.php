@extends("layouts.app")

@section("content")
<x-subheader title="Gestion des contrats" subtitle="{{ $article->nom }}"/>
<div class="container">
    <form action="{{ $contrat ?
        route('article.contrats.update', ['article' => $article, 'contrat' => $contrat]) :
        route('article.contrats.store', $article) }}" method="POST">
        @csrf
        @if($contrat)
            @method("PUT")
        @endif

        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h2 class="card-label">
                        <span class="font-weight-bold">
                            {{ $contrat ? "Modifier contrat | " . $contrat->nom : "Nouveau contrat"}}
                        </span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Libellé <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Entrez le libellé du contrat" name="nom"
                                value="{{ $contrat ? $contrat->nom : old('contrat')}}"
                            >
                            @error("nom")
                            <span class="form-text text-danger">{{ $message }}.</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cout">Coût <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cout" name="cout"
                                    value="{{ $contrat ? $contrat->cout : old('cout') }}" />
                                <span class="input-group-text" id="inputGroupPrepend">FCFA</span>
                            </div>
                            @error("cout")
                                <span class="form-text text-danger">{{ $message }}.</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_effet" class="form-label">Date d'effet</label>
                            <input type="date" class="form-control" name="date_effet" id="date_effet"
                            value="{{ $contrat ? $contrat->date_effet : old('date_effet') }}"
                            >
                            @error("date_effet")
                            <span class="form-text text-danger">{{ $message }}.</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Durée <span class="text-danger">*</span></label>
                            <div class="d-flex">
                                <input type="text" name="duree" class="form-control" placeholder="Entrez la durée du contrat"
                                value="{{ $contrat ? $contrat->duree : old('duree') }}"
                                >
                                <select name="periode_duree" id="" class="select">
                                    <option value="0" {{ $contrat && $contrat->periode_duree == "0" ? "selected" : ""}}>Mois</option>
                                    <option value="1" {{ $contrat && $contrat->periode_duree == "1" ? "selected" : ""}}>An(s)</option>
                                </select>
                            </div>

                            @error("duree")
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Durée sur site <span class="text-danger">*</span></label>
                            <div class="d-flex">
                                <input type="text" class="form-control" name="duree_site" placeholder="Entrez la durée du contrat"
                                value="{{ $contrat ? $contrat->duree_site : old('duree_site') }}"
                                >
                                <select name="periode_duree_site" id="" class="select">
                                    <option value="0" {{ $contrat && $contrat->periode_duree_site == "0" ? "selected" : ""}}>Mois</option>
                                    <option value="1" {{ $contrat && $contrat->periode_duree_site == "1" ? "selected" : ""}}>An(s)</option>
                                </select>
                            </div>

                            @error("duree_site")
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="preavis"> Préavis <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="preavis" name="preavis"
                                value="{{ $contrat ? $contrat->preavis : old('preavis') }}"  />
                                <span class="input-group-text" id="inputGroupPrepend">mois</span>
                            </div>
                            @error("preavis")
                            <span class="form-text text-danger">{{ $message }}.</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="echeance" class="form-label">Echeance</label>
                            <input type="date" class="form-control" name="echeance" id="echeance"
                            value="{{ $contrat ? $contrat->echeance : old('echeance') }}"
                            >
                            @error("echeance")
                            <span class="form-text text-danger">{{ $message }}.</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="echeance_site" class="form-label">Echeance sur site</label>
                            <input type="date" class="form-control" name="echeance_site" id="echeance_site"
                            value="{{ $contrat ? $contrat->echeance_site : old('echeance_site') }}"
                            >
                            @error("echeance_site")
                            <span class="form-text text-danger">{{ $message }}.</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="observation">Observations </label>
                            <textarea type="email" class="form-control" name="observation" id="observation"
                            >{{ $contrat ? $contrat->observation : old('observation') }}</textarea>
                            @error("observation")
                            <span class="form-text text-danger">{{ $message }}.</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">

                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">
                            {{ $contrat ? "Mettre à jour" : "Enregistrer"}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
