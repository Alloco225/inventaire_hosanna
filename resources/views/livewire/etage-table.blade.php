
<div>
    <div class="d-flex justify-content-end">
        <button type="button" data-toggle="modal" data-target="#modalEtage" class="btn btn-primary btn-sm font-weight-bolder"><i class="la la-plus"></i> Ajouter un etage</button>
    </div>

    <table class="table  table-checkable" id="kt_datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Site</th>
            <th class="d-flex justify-content-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etages as $etage)
            <tr role="button"  wire:click="etageSelected({{ $etage }})" class="{{$etage->id == $click ? 'bg-light' : ''}}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $etage->nom_etage }}</td>
                <td>{{ $etage->site->nom_site }}</td>
                <td class="d-flex justify-content-end">
                    <button wire:click="etageSelected({{ $etage }})" class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.arrow-right")
                    </button>
                    <button wire:click="edit({{$etage->id}})" type="button" data-toggle="modal" data-target="#modalEtageUpdate"  class="btn btn-icon btn-light btn-sm mr-2">
                        @include("layouts.icons.pencil")
                    </button>
                    <form action="{{ route("etage.destroy", $etage) }}" method="POST">
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
    {{ $etages->links() }}


    <x-modal title="Ajouter un etage" id="modalEtage">
    <!-- modal-site -->
        <livewire:etage-form :site="$site"/>

        <!-- site:$site pas necessaire -->
    </x-modal>
</div>



