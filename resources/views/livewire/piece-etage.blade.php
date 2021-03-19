<div>
<div class="d-flex justify-content-end" >
        <button type="button" data-toggle="modal" wire:click="edit({{$etage_id}})" data-target="#modalPiece" class="btn btn-primary btn-sm font-weight-bolder" {{ $etage_id ? '' : 'disabled' }}><i class="la la-plus"></i> Ajouter une piece</button>
    </div>
    
    <table class="table  table-checkable" id="kt_datatable" >
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>N de porte</th>
                <th>Surface</th>
                <th>Nb fenetre</th>
              
                <th class="d-flex justify-content-end">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pieces as $piece)
            <tr >
                <td >{{ $loop->index + 1 }}</td>
                <td>{{ $piece->nom_piece }}</td>
                <td>{{ $piece->numero_porte }}</td>
                <td>{{ $piece->surface }}</td>
                <td>{{ $piece->nb_fenetre}}</td>
                
               
                <td class="d-flex justify-content-end">
                <button  class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.arrow-right")
                    </button>

                    <button wire:click="editPiece({{$piece->id}})" type="button" data-toggle="modal" data-target="#modalEtagePiece"  class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.pencil")
                    </button>
                
                
                        <button wire:click="delete({{$piece->id}})" class="btn btn-icon btn-light btn-sm delete-button">
                            @include("layouts.icons.trash")
                        </button>
            
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($pieces)
        {{ $pieces->links() }}
    @endif

</div>
