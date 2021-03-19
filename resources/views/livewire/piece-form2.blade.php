<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="createPiece">
        <div class="modal-body">
            @csrf
            <div class="row">
            
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_piece" wire:model="nom_piece" />
                        <input type="hidden" class="form-control"  name="etage_id" wire:model="etage_id" />
                        @error("nom_piece")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
    <div class="form-group">
        <label for="site_id">Site<span class="text-danger">*</span></label>
        <br>
        <select name="site_id" id="site" class="form-control" wire:model="site_id">
            <option value="" selected>Choisissez un site</option>
            @foreach ($sites as $site)
                <option value="{{ $site->id}}">{{$site->nom_site}}</option>
            @endforeach
        </select>
        @error("site")
        <span class="form-text text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
                
            </div>
            <div class="row">



@if (!is_null($site_id))
    <div class="col-md-12 col-lg-6">
        <div class="form-group">
            <label for="etage">Etage</label>
            <br>
            <select name="etage" id="etage" class="form-control" wire:model="etage_id">
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

</div>
            <div class="row">
            <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Surface <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="nom_piece" wire:model="surface" />
                        
                        @error("suface")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label id="nom_site">Numero porte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="numero_etage" wire:model="numero_porte" />
                        
                        @error("numero_piece")
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


             </div> <!--end row -->

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click='clearForm()'>Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter <div wire:loading wire:target="submit">
                            ....
                        </div></button>

        </div>
    </form>
</div>
