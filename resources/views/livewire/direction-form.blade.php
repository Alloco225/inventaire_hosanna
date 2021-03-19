<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="createDirection">
        <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_direction" wire:model="nomDirection" />
                        @error("nomDirection")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="nature">Code direction</label>
                        <input type="text" class="form-control" name="code_direction"  wire:model="codeDirection" />
                        @error("codeDirection")
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
                        <label for="nom_directeur">Nom directeur</label>
                        <input type="text" class="form-control" name="nom_directeur" wire:model="nomDirecteur"  />
                        @error("nomDirecteur")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="adresse_postale">Description activite</label>
                        <input type="text" class="form-control"  name="description_active" wire:model="descriptionActive"/>
                        @error("descriptionActive")
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

                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="commentaire">Appartements</label>
                        <input type="text" class="form-control" name="appartements" wire:model="appartements">
                        @error("appartements")
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
