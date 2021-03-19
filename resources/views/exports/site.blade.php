<table>
    <thead>
    <tr>
        <th>N</th>
        <th>Nom</th>
        <th>Nature</th>
        <th>Contact</th>
        <th>Code Postal</th>
      
    </tr>
    </thead>
    <tbody>
    @foreach($sites as $site)
        <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $site->nom_site }}</td>
        <td>{{ $site->nature }}</td>
        <td>{{ $site->contact }}</td>
        <td>{{ $site->code_postal }}</td>
        </tr>
    @endforeach
    </tbody>
</table>