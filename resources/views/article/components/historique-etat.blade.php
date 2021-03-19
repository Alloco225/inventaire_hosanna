<div>
    <h5>Historiques des etats</h5>
    <hr/>
    <div class="my-4 d-flex justify-content-end">
        <a href="#" class="btn btn-light-primary font-weight-bold mr-2"><i class="la la-plus"></i> Nouvel Historique</a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Libelle</th>
                <th scope="col">Etat prec</th>
               
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($article->etatHistoriques as $historique)
            <tr>
                <th scope="row"> {{ date("d-m-Y", strtotime($historique->created_at)) }}</th>
                <td>{!!$historique->libelle!!}</td>

                <td>{{$historique->old_state}}</td>
          
                <td>
                    <div class="d-flex">
                        <a href="#" class="btn btn-icon btn-light btn-sm mr-2">
                            @include("layouts.icons.pencil")
                        </a>
                        <form action="#" method="POST"
                           >
                            @csrf

                            <button type="submit" class="btn btn-icon btn-light btn-sm delete-button">
                                @include("layouts.icons.trash")
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
