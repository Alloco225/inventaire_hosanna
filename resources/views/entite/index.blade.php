@extends("layouts.app")

@section("content")
    <x-subheader title="Entité" subtitle="Configuration"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        Modifier l'entité
                    </h3>
                </div>
                <form method="POST" action="{{ route("entite.update") }}">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group mb-8">
                            <div class="alert alert-custom alert-default" role="alert">
                                <div class="alert-icon"><i class="flaticon-info text-primary"></i></div>
                                <div class="alert-text">
                                    Ce formulaire vous permet de modifier les informations sur l'entité
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label id="raison_sociale">Raison sociale </label>
                                    <input type="text" class="form-control"  name="raison_sociale" value="{{ $entite->raison_sociale }}"/>
                                    @error("raison_sociale")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="code_postal">Code postal</label>
                                    <input type="number" class="form-control" name="code_postal" value="{{ $entite->code_postal }}" />
                                    @error("code_postal")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="type_particulier">Type particulier </label>
                                    <input type="text" class="form-control" id="type_particulier"  name="type_particulier" value="{{ $entite->type_particulier }}"/>
                                    @error("type_particulier")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nom_responsable_projet">Nom du responsable du projet </label>
                                    <input type="text" class="form-control" id="nom_responsable_projet"  name="nom_responsable_projet" value="{{ $entite->nom_responsable_projet }}"/>
                                    @error("nom_responsable_projet")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="forme_de_societe">Forme de la société <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="forme_de_societe" name="forme_de_societe" value="{{ $entite->forme_de_societe }}" />
                                    @error("forme_de_societe")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="objet_social">Objet social <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="objet_social"  name="objet_social" value="{{ $entite->objet_social }}"/>
                                    @error("objet_social")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="rmcc">RMCC <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="rmcc" name="rmcc" value="{{ $entite->rmcc }}" />
                                    @error("rmcc")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="ncc">NCC </label>
                                    <input type="text" class="form-control" id="ncc"  name="ncc" value="{{ $entite->ncc }}"/>
                                    @error("ncc")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nom_du_groupe">Nom du groupe </label>
                                    <input type="text" class="form-control" id="nom_du_groupe" name="nom_du_groupe" value="{{ $entite->nom_du_groupe }}" />
                                    @error("nom_du_groupe")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="contact_organisation">Contact de l'organisation <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="contact_organisation"  name="contact_organisation" value="{{ $entite->contact_organisation }}"/>
                                    @error("contact_organisation")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="contact_responsable_projet">Contact responsable du projet </label>
                                    <input type="text" class="form-control" id="contact_responsable_projet" name="contact_responsable_projet" value="{{ $entite->contact_responsable_projet }}" />
                                    @error("contact_responsable_projet")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="code_automatique">Code automatique <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="code_automatique"  name="code_automatique" value="{{ $entite->code_automatique }}"/>
                                    @error("code_automatique")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="numero_ordre">Numéro d'ordre </label>
                                    <input type="text" class="form-control" id="numero_ordre" name="numero_ordre" value="{{ $entite->numero_ordre }}" />
                                    @error("numero_ordre")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="numero_identification_fiscale">Numero d'identification sociale</label>
                                    <input type="text" class="form-control" id="numero_identification_fiscale"  name="numero_identification_fiscale" value="{{ $entite->numero_identification_fiscale }}"/>
                                    @error("numero_identification_fiscale")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="sigle">Sigle</label>
                                    <input type="text" class="form-control" id="sigle" name="sigle" value="{{ $entite->sigle }}" />
                                    @error("sigle")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="adresse_siege_social">Adresse siège sociale</label>
                                    <textarea type="text" class="form-control" id="adresse_siege_social" name="adresse_siege_social"
                                    rows="5">{{ $entite->adresse_siege_social }}</textarea>
                                    @error("adresse_siege_social")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Mettre à jour</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
@endsection
