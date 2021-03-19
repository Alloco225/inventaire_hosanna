<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">Liste des directions
                    </h3>
                </div>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @include("layouts.icons.ruller") Exporter
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                    Choisissez une option:
                                </li>
                                <li class="navi-item">
                                    <a href="{{route('exports.direction.print')}}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                        <span class="navi-text">Print</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-copy"></i>
                                            </span>
                                        <span class="navi-text">Copy</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="{{route('exports.direction.excel')}}" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
                                        <span class="navi-text">Excel</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="{{route('exports.direction.excel')}}" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-text-o"></i>
																</span>
                                        <span class="navi-text">CSV</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="{{route('exports.direction.pdf')}}" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-pdf-o"></i>
																</span>
                                        <span class="navi-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>

                    <button type="button" data-toggle="modal" data-target="#modalDirection" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i> Ajouter une direction</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table  table-checkable" id="kt_datatable">
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($directions as $direction)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $direction->nom_direction }}</td>
                            <td>{{ $direction->code_direction }}</td>
                            <td>{{ $direction->contact }}</td>
                            <td>{{ $direction->nom_directeur }}</td>
                            <td>{{ $direction->description_active }}</td>
                            <td>{{ $direction->commentaire }}</td>
                            <td>Listes des appartements</td>
                            <td> 
                            
                             @foreach($direction->bureaux as $bureau)
                                <p>{{$bureau->nom_bureau}}</p>
                            @endforeach
                            
                            </td>
                            <td>{{ $direction->code_automatique }}</td>
                            
                            <td class="d-flex">
                                <a href="#" class="btn btn-icon btn-light btn-sm mr-2">
                                    @include("layouts.icons.arrow-right")
                                </a>
                                <button wire:click="edit({{$direction->id}})" type="button" data-toggle="modal" data-target="#modalDirectionUpdate"  class="btn btn-icon btn-light btn-sm mr-2">
                                    @include("layouts.icons.pencil")
                                </button>
                                <form action="{{ route("direction.destroy", $direction) }}" method="POST">
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
            </div>
        </div>

        <div class="mt-3 ">
        {{$directions->links()}}
        </div>

        
    </div>
</div>

