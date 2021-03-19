<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Site</th>
    </tr>
    </thead>
    <tbody>
    @foreach($etages as $etage)
        <tr>
            <td>{{ $etage->nom_etage }}</td>
            <td>{{ $etage->site->nom_site }}</td>
        </tr>
    @endforeach
    </tbody>
</table>