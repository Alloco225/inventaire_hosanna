<div class="card-body">
    <table class="table  table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Numero de porte</th>
                <th>Nom</th>
                <th>Nombre occupants</th>
                <th>commentaire</th>
                <th>Code automatique</th>
                <th>Direction</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bureaux as $bureau)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $bureau->n_porte_bureau }}</td>
                <td>{{ $bureau->nom_bureau }}</td>
                <td>{{ $bureau->nb_occupants }}</td>
                <td>{{ $bureau->commentaire }}</td>
                <td>{{ $bureau->code_automatique }}</td>
                <td>{{ $bureau->directions->first()->nom_direction }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
