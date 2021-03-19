<table class="table  table-checkable" id="kt_datatable">
    <thead>
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Etage</th>
        <th>Directions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($appartements as $appartement)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $appartement->nom_appartement }}</td>
            <td>{{ $appartement->etage->nom_etage }}</td>
            <td>Liste des directions</td>
        </tr>
    @endforeach
    </tbody>
</table>
