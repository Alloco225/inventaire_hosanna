<div>
    <h1>Contrats</h1>
    <hr/>
    <div class="my-4 d-flex justify-content-end">
        <a href="{{ route("article.contrats.create", $article) }}" class="btn btn-light-primary font-weight-bold mr-2"><i class="la la-plus"></i> Nouveau contrat</a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Date effet</th>
                <th scope="col">Durée</th>
                <th scope="col">Préavis</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($article->contrats as $contrat)
            <tr>
                <th scope="row">{{$contrat->nom}}</th>
                <td>{{ date("d-m-Y", strtotime($contrat->date_effet)) }}</td>
                <td>{{ $contrat->duree . ($contrat->periode_duree ? " an(s)" : " mois") }}</td>
                <td>{{ $contrat->preavis . " mois"}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('article.contrats.edit', ['article' => $article, 'contrat' => $contrat]) }}" class="btn btn-icon btn-light btn-sm mr-2">
                            @include("layouts.icons.pencil")
                        </a>
                        <form action="{{ route('article.contrats.destroy', ['article' => $article, 'contrat' => $contrat]) }}" method="POST"
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
