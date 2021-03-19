<table class="table  table-checkable" id="kt_datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>code_barre</th>
            <th>nom</th>
            <th>quantite</th>
            <th>observation</th>
            <th>prix</th>
            <th>lieu precis</th>
            <th>etat</th>
            <th>quantite_inventoriee</th>
            <th>observation_a_inventaire</th>
            <th>Date</th>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
