<table class="table  table-checkable" id="kt_datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Code Barre</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Observation</th>
            <th>Prix</th>
            <th>Lieu</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $article->code_barre }}</td>
                <td>{{ $article->nom }}</td>
                <td>{{ $article->quantite }}</td>
                <td>{{ $article->observation }}</td>
                <td>{{ $article->prix_achat }}</td>
                <td>{{ $article->lieu}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
