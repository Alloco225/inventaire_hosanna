<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="updateAppartement({{$appartementId}})">
        <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_appartement" wire:model="nom_appartement" />
                        @error("nom_appartement")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="nature">etage</label>
                        <select class='form-control' wire:model="etageId">
                            <option value="">Selectionner un etage...</option>
                            @foreach($etages as $etage)
                            <option value="{{$etage->id}}">{{$etage->nom_etage}}</option>
                            @endforeach
                        </select>
                        @error("etageId")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="commentaire">Directions</label>
                        <input type="text" class="form-control" name="directions" wire:model="directions">
                        @error("directions")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"  wire.click='clearForm()'>Annuler</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
</div>
