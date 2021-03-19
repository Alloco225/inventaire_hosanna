<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="POST" wire:submit.prevent="createArticle">
        <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-6">
                   
                <fieldset class="border p-2 border-dark">
                    <legend  class="w-auto">Localisation geographique</legend>

                    <div class="form-group">
                        <label id="nom_site">Site <span class="text-danger">*</span></label>
                        <select name="" id="">
                            <option value="">Selectionner le site</option>
                            @foreach($sites as $site)
                            <option value="">{{$site->nom_site}}</option>
                            @endforeach
                        
                        </select>
                        
                        @error("site")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                    <label id="nom_site">Etage <span class="text-danger">*</span></label>
                        <select name="" id="">
                            <option value="">Selectionner l'etage</option>
                            @foreach($etages as $etage)
                            <option value="">{{$etage->nom_etage}}</option>
                            @endforeach
                        
                        </select>
                        
                        @error("etage")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label id="nom_site">Piece <span class="text-danger">*</span></label>
                        <select name="" id="">
                            <option value="">Selectionner le site</option>
                            @foreach($pieces as $piece)
                            <option value="">{{$piece->nom_piece}}</option>
                            @endforeach
                        
                        </select>
                        
                        @error("piece")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </fieldset>
                                    
                </div>

                
             
                <div class="col-md-12 col-lg-6">
                <fieldset class="border p-2 border-dark">
                    <legend  class="w-auto">Localisation Organisationnelle</legend>

                    <div class="form-group">
                        <label id="nom_site">Direction <span class="text-danger">*</span></label>
                        <select name="" id="">
                            <option value="">Selectionner la direction</option>
                        
                        </select>
                        
                        @error("direction")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                    <label id="nom_site">Bureaux<span class="text-danger">*</span></label>
                        <select name="" id="">
                            <option value="">Selectionner le bureau</option>
                        
                        </select>
                        
                        @error("bureau")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </fieldset>
                </div>
        
            </div>

            <div class="row">
            <div class="col-md-12 col-lg-12">
                <fieldset class="border p-2 border-dark">
                        <legend  class="w-auto">Details</legend>

                        <div class="form-group ">

                        <label for="">Categorie</label>
                                <select name="" id="">
                                
                                    <option value="">
                                    Slectionner la categorie
                                    </option>

                                    @foreach($categories as $categorie)


                                    <option value="">{{$categorie->libelle}}</option>
                                    @endforeach
                                </select>
                      
                            


                            @error("category")
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group ">

                                <label for="">Sous Categorie</label>
                                        <select name="" id="">
                                        
                                            <option value="">
                                            Slectionner la sous categorie
                                            </option>

                                            @foreach($sous_categories as $scategorie)


                                            <option value="">{{$scategorie->libelle}}</option>
                                            @endforeach
                                        </select>

                                    


                                    @error("category")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror

                        </div>


                        <div class="form-group ">

                            <label for="">Designation</label>
                            <textarea name="" id="" cols="30" rows="5"></textarea>

                                    


                                    @error("category")
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror

                        </div>


                        <div class="form-group ">

                        <label for="">Modele</label>
                        <input type="text">
                                @error("category")
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                        </div>


                        <div class="form-group ">

                        <label for="">Qte</label>
                        <input type="text">
                                @error("category")
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group ">

                        <label for="">N° Inentaire</label>
                        <input type="text">
                                @error("category")
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-inline ">

                        <label for="">N° Serie</label>
                        <input type="text">
                                @error("category")
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror


                        <label for="">Etat</label>
                        <input type="text">
                        </div>

            
                </fieldset>
            
            </div>


               


             </div> <!--end row -->

            <label for="">Observation</label>

             <textarea name="" id="" cols="30" rows="10"></textarea>

             <label for="">Code bare</label>
                <input type="text">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click='clearForm()'>Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter <div wire:loading wire:target="submit">
                            ....
                        </div></button>

        </div>
    </form>
</div>
