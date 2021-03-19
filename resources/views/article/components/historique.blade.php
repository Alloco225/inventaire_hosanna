<div>
    <h5>Historiques des mouvements</h5>
    <hr/>
    <div class="my-4 d-flex justify-content-end">
        <a href="#" class="btn btn-light-primary font-weight-bold mr-2"><i class="la la-plus"></i> Nouvel Historique</a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Libelle</th>
                <th scope="col">Diff Quantite</th>
                <th scope="col">Observation</th>
               
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($article->historiques as $historique)
            <tr>
                <th scope="row"> {{ date("d-m-Y", strtotime($historique->created_at)) }}</th>
                <td>{!!$historique->libelle!!}</td>
                <td>{{$historique->diff_quantity}}</td>
                <td>{{$historique->observation}}</td>

                
          
                <td>
                    <div class="d-flex">
                        <a href="{{ route('article.historique.edit', ['article' => $article, 'historique' => $historique]) }}" class="btn btn-icon btn-light btn-sm mr-2">
                            @include("layouts.icons.pencil")
                        </a>
                        <form action="{{ route('article.historique.destroy', ['article' => $article, 'historique' => $historique]) }}" method="POST"
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
