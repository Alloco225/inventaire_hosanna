
<div>
<div class="row">
    <div class="col-lg-8 col-md-8">
            <div class="card">


            <div class="card-header">
            <h3>Recherche rapide</h3>
            </div>

            <div class="card-body bg-secondary">

            <form>
            <div class="form-group row">
            <label for="nature" class="col-sm-2 col-form-label">Site</label>
                <div class="col-sm-10">
                <select class='form-control ml-2' >
                    <option value="">Selectionner un site...</option>
                
                    <option value=""></option>

                </select>
                </div>
            </div>
            <div class="form-group row">
            <label for="nature" class="col-sm-2 col-form-label">Etage</label>
                <div class="col-sm-10">
                <select class='form-control ml-2' >
                    <option value="">Selectionner un etage...</option>
                
                    <option value=""></option>

                </select>
                </div>
            </div>

            <div class="form-group row">
            <label for="nature" class="col-sm-2 col-form-label">Piece</label>
                <div class="col-sm-10">
                <select class='form-control ml-2' >
                    <option value="">Selectionner une piece...</option>
                
                    <option value=""></option>

                </select>
                </div>
            </div>

            <div class="form-group row">
            <label for="nature" class="col-sm-2 col-form-label">Code barre</label>
                <div class="col-sm-10">
                <input type="text"  class="form-control" id="staticEmail" >
                </div>
            </div>







            <div class="float-right">
                    <button type="button" data-toggle="modal" data-target="#modalArticle"   class="btn btn-success btn-sm font-weight-bolder" > <i class="la la-plus"></i> Ajouter un article</button>
                </div>

                <div class="clearfix"></div>
            </div>

            </form>

            </div>
    </div>

    <div class="col-lg-4 col-md-4">

    </div>

</div>
    

    <table class="table  table-checkable" id="kt_datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Qte</th>
            <th>Designation</th>
            <th>Marques/Modeles</th>
            <th>Numero d'inventaire</th>
            <th>Numero de serie</th>
            <th class="d-flex justify-content-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr role="button"  wire:click="articleSelected({{$article }})" class="{{$piece->id == $click ? 'bg-light' : ''}}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$article->nom_etage }}</td>
                <td>{{$article->piece->nom_site }}</td>
                <td class="d-flex justify-content-end">
                    <button wire:click="articleSelected({{$article }})" class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.arrow-right")
                    </button>
                    <button wire:click="edit({{$article->id}})" type="button" data-toggle="modal" data-target="#modalArticle"  class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.pencil")
                    </button>
                    <form action="{{ route("article.destroy",$article) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-icon btn-light btn-sm delete-button">
                            @include("layouts.icons.trash")
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$articles->links() }}


  
</div>



