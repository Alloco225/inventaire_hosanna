<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="updateSite({{$siteId}})">
        <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_site" wire:model="nom_site" />
                        @error("nom_site")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="nature">Nature</label>
                        <input type="text" class="form-control" name="nature"  wire:model="nature" />
                        @error("nature")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="contact">Contact </label>
                        <input type="text" class="form-control"  name="contact" wire:model="contact"/>
                        @error("contact")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="number" class="form-control" name="fax" wire:model="fax"  />
                        @error("fax")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="adresse_postale">Adresse postale </label>
                        <input type="text" class="form-control"  name="adresse_postale" wire:model="adresse_postale"/>
                        @error("adresse_postale")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="code_postal">Code postal</label>
                        <input type="number" class="form-control" name="code_postal"  wire:model="code_postal" />
                        @error("code_postal")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="localisation_geographique">Localisation géographique</label>
                        <textarea type="number" class="form-control" wire:model="localisation_geographique"></textarea>
                        @error("localisation_geographique")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="commentaire">Commentaires</label>
                        <textarea type="number" class="form-control" wire:model="commentaire"></textarea>
                        @error("commentaire")
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
