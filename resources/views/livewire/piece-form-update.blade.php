<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="updatePiece({{$pieceId}})">
        <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_piece" wire:model="nom_piece" />
                        @error("nom_piece")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if(!$this->piece)
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="nature">Etage</label>
                        <select class='form-control' wire:model="etageId">
                            <option value="">Selectionner un un...</option>
                            @foreach($etages as $etage)
                            <option value="{{$etage->id}}" >{{$etage->nom_etage}}</option>
                            @endforeach
                        </select>
                        @error("etageId")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif
            </div>

            <div class="row">
            <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Surface <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_piece" wire:model="surface" />
                        
                        @error("surface")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Numero porte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="numero_etage" wire:model="numero_porte" />
                        
                        @error("numero_porte")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


             </div> <!--end row -->


             <div class="row">
            <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Code Barre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="code_barre" wire:model="code_barre" />
                        
                        @error("code_barre")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Nombre fenetre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nb_fenetre" wire:model="nb_fenetre" />
                        
                        @error("nb_fenetre")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


             </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"  wire.click='clearForm()'>Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
