
<div>
    <div class="d-flex justify-content-end">
        <button type="button" data-toggle="modal" data-target="#modalAppartement" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i> Ajouter un appartement</button>
    </div>
    <table class="table  table-checkable" id="kt_datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Etage</th>
            <th>Directions</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appartements as $appartement)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $appartement->nom_appartement }}</td>
                <td>{{ $appartement->etage->nom_etage }}</td>
                <td>Liste des directions</td>
                <td class="d-flex">
                    <a href="#" class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.arrow-right")
                    </a>
                    <button wire:click="edit({{$appartement->id}})" type="button" data-toggle="modal" data-target="#modalAppartementUpdate"  class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.pencil")
                    </button>
                    <form action="{{ route("appartement.destroy", $appartement) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-icon btn-light btn-sm delete-button">
                            @include("layouts.icons.trash")
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $appartements->links() }}
</div>

