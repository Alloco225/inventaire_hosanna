<div class="card-body">
    <table class="table  table-checkable table-bordered" id="kt_datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Code direction</th>
                <th>Contact</th>
                <th>Nom directeur</th>
                <th>Description active</th>
                <th>Commentaire</th>
                <th>Appartements</th>
                <th>Bureaux</th>
                <th>Code auto</th>
            </tr>
        </thead>
        <tbody>
        @foreach($directions as $direction)
            <tr>
                <span><td>{{ $loop->index + 1 }}</td></span>
               <span> <td>{{ $direction->nom_direction }}</td></span>
                <span><td>{{ $direction->code_direction }}</td></span>
                <span><td>{{ $direction->contact }}</td></span>
                <span><td>{{ $direction->nom_directeur }}</td></span>
                <span><td>{{ $direction->description_active }}</td></span>
                <span><td>{{ $direction->commentaire }}</td></span>
                <span><td>Listes des appartements</td></span>
                <span> <td>
                    @foreach($direction->bureaux as $bureau)
                       <p>{{$bureau->nom_bureau}}</p>
                    @endforeach
                   </td></span>
                <span><td>{{ $direction->code_automatique }}</td></span>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
