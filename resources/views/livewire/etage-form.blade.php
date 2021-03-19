<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="createEtage">
        <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_etage" wire:model="nom_etage" />
                        @error("nom_etage")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if(empty($this->site))
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="nature">Site</label>
                        <select class='form-control' wire:model="siteId">
                            <option value="">Selectionner un site...</option>
                            @foreach($sites as $site)
                            <option value="{{ $site->id }}">{{ $site->nom_site }}</option>
                            @endforeach
                        </select>
                        @error("siteId")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click='clearForm()'>Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter <div wire:loading wire:target="submit">
                            ....
                        </div></button>

        </div>
    </form>
</div>
