<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="updateArticle({{$articleId}})">
        <div class="modal-body">
            @csrf

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom" wire:model="nom" />
                        @error("nom")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="fournisseur_id">Fournisseur</label>
                        <br>
                        <select name="fournisseur_id" id="fournisseur" class="form-control" wire:model="fournisseur_id">
                            <option value="" selected>Choisissez un Fournisseur</option>
                            @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id}}" class="form-control">{{$fournisseur->nom}}</option>
                            @endforeach
                        </select>
                        @error("code_barre")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="code_barre">Code Barre</label>
                        <input type="text" class="form-control" name="code_barre"  wire:model="code_barre" />
                        @error("code_barre")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{--<div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" name="photo"  wire:model="photo" />
                        @error("photo")
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>--}}
            </div>
            <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="site">Site</label>
                            <br>
                            <select name="site" id="site" class="form-control" wire:model="selected_site">
                                <option value="" selected class="form-control">Choisissez un site</option>
                                @foreach ($sites as $site)
                                    <option value="{{$site->id}}" class="form-control">{{$site->nom_site}}</option>
                                @endforeach
                            </select>
                            @error("site")
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if (!is_null($selected_site))
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="etage">Etage</label>
                                <br>
                                <select name="etage" id="etage" class="form-control" wire:model="selected_etage">
                                    <option value="" selected>Choisissez un Etage</option>
                                    @foreach ($etages as $etage)
                                        <option value="{{$etage->id}}" >{{$etage->nom_etage}}</option>
                                    @endforeach
                                </select>
                                @error("etage")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if (!is_null($selected_etage))
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="piece_id">Piece</label>
                                <br>
                                <select name="piece_id" id="piece" class="form-control" wire:model="piece_id">
                                    <option value="" selected>Choisissez une Piece</option>
                                    @foreach ($pieces as $piece)
                                        <option value="{{ $piece->id}}">{{$piece->nom_piece}}</option>
                                    @endforeach
                                </select>
                                @error("piece")
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
            </div>
            <div class="row">

                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="quantite">quantite <span class="text-danger">*</span></label>
                        <input type="number" class="form-control"  name="quantite" wire:model="quantite"/>
                        @error("quantite")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="lieu">Lieu</label>
                        <input type="text" class="form-control" name="lieu" wire:model="lieu"  />
                        @error("lieu")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="numero_lot">Numero Lot</label>
                        <input type="text" class="form-control"  name="numero_lot" wire:model="numero_lot"/>
                        @error("numero_lot")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="prix_achat">Prix Achat<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="prix_achat"  wire:model="prix_achat" />
                        @error("prix_achat")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="taux_amortissement">Taux Amortissement</label>
                        <textarea type="text" class="form-control" wire:model="taux_amortissement"></textarea>
                        @error("taux_amortissement")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="etat_id">Etat</label>
                        <br>
                        <select name="etat_id" id="etat" class="form-control" wire:model="etat_id">
                            <option value="" selected>Choisissez un Etat</option>
                            @foreach ($etats as $etat)
                                <option value="{{ $etat->id}}">{{$etat->libelle}}</option>
                            @endforeach
                        </select>
                        @error("code_barre")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="observation">Observation</label>
                        <textarea type="text" class="form-control" wire:model="observation"></textarea>
                        @error("observation")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="buy_at">Achetez le</label>
                        <input type="date" class="form-control" wire:model="buy_at"/>
                        @error("buy_at")
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="valeur_residuelle">Valeur Résiduelle</label>
                        <input type="text" class="form-control" wire:model="valeur_residuelle"/>
                        @error("valeur_residuelle")
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="numero_serie">Numero Serie<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="numero_serie"  wire:model="numero_serie" />
                        @error("numero_serie")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="modele">modele</label>
                        <input type="text" class="form-control" wire:model="modele"/>
                        @error("modele")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="categorie_id">Catégorie</label>
                        <br>
                        <select name="categorie_id" id="categorie" class="form-control" wire:model="selected_categorie">
                            <option value="" selected>Choisissez une catégorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                            @endforeach
                        </select>
                        @error("categorie_id")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if (!is_null($selected_categorie))
                    <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="sous_categorie_id">Sous Catégorie</label>
                            <br>
                            <select name="sous_categorie_id" id="sous_categorie" class="form-control" wire:model="sous_categorie_id">
                                <option value="" selected>Choisissez une sous catégorie</option>
                                @foreach ($sous_categories as $sous_categorie)
                                        <option value="{{ $sous_categorie->id}}" >{{$sous_categorie->libelle}}</option>
                                @endforeach
                            </select>
                            @error("categorie_id")
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif

            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="nombre_annee_amortie">Nombre Annee Amortie</label>
                        <input type="number" class="form-control" wire:model="nombre_annee_amortie"/>
                        @error("nombre_annee_amortie")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="nombre_annee_garantie">Nombre Annee Garantie</label>
                        <input type="number" class="form-control" wire:model="nombre_annee_garantie"/>
                        @error("nombre_annee_garantie")
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="etiquette">Etiquette</label>
                        <input type="text" class="form-control" wire:model="etiquette"/>
                        @error("etiquette")
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="sortie_inventaire">Sortie Inventaire</label>
                        <textarea type="text" class="form-control" wire:model="sortie_inventaire"></textarea>
                        @error("sortie_inventaire")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="composant">Composants</label>
                        <textarea type="text" class="form-control" wire:model="composant"></textarea>
                        @error("composant")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"  wire.click='clearForm()'>Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter <div
                            wire:loading wire:target="submit">
                            ....
                        </div></button>
        </div>

    </form>
</div>
