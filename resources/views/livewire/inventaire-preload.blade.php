<div class="container">
        <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Saisie et Consultation
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
                                <a href="{{route('exports.article.print')}}" class="navi-link">
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
                                <a href="{{route('exports.article.excel')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="{{route('exports.article.excel')}}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="la la-file-text-o"></i>
                                                            </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="{{route('exports.article.pdf')}}" class="navi-link">
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

                <button type="button" data-toggle="modal" data-target="#modalArticle" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i> Ajouter un article</button>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
       
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
                <div class="container"  style="overflow: auto;">
                    <div class="card card-custom gutter-b"  >
                        <div class="card-body">
                            <table class="table  table-checkable table-responsive table-bordered" id="kt_datatable" >
                                <thead>
                                    <tr>
                                        <th><-T-></th>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Designation</th>
                                        <th>Qte</th>
                                        <th>N inventaire</th>
                                        <th>Observation à l'inventaire</th>
                                        <th>Qte Inventoriée</th>
                                        <th class="w-100">Site</th>
                                        <th>Etage</th>
                                        <th>Piece</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventaires as $inventaire)
                                        <tr>
                                            <td><input type="checkbox" value="" ></td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $inventaire->article->code_barre }}</td>
                                            <td>{{ $inventaire->article->nom }}</td>
                                            <td>{{ $inventaire->article->quantite }}</td>
                                         
                                            <td>{{ $inventaire->numero_inventaire }}</td>
                                            <td><textarea ></textarea></td>
                                            <td><input type="number"  wire:model=""></td>
                                            <td class="w-100">
                                                
                                                   
                                                    <select  wire:model="site_id">
                                                        <option value=""></option>
                                                        @foreach ($sites as $site)
                                                            <option value="{{$site->id}}">{{$site->nom_site}}</option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </td>
                                            <td>
                                            
                                            <select  wire:model="site_id">
                                                        <option value=""></option>
                                                        @foreach ($sites as $site)
                                                            <option value="{{$site->id}}">{{$site->nom_site}}</option>
                                                        @endforeach
                                                    </select>
                                            
                                            </td>
                                            <td>
                                            

                                            <select  wire:model="site_id">
                                                        <option value=""></option>
                                                        @foreach ($sites as $site)
                                                            <option value="{{$site->id}}">{{$site->nom_site}}</option>
                                                        @endforeach
                                                    </select>
                                            
                                            
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route("article.show", $inventaire) }}" class="btn btn-icon btn-light btn-sm mr-2">
                                                    @include("layouts.icons.arrow-right")
                                                </a>
                                                <button  type="button" data-toggle="modal" data-target="#modalArticleUpdate"  class="btn btn-icon btn-light btn-sm mr-2">
                                                    @include("layouts.icons.pencil")
                                                </button>
                                                <form action="{{ route("article.destroy", $inventaire) }}" method="POST">
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
                    

                    <div>


                      
                    </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


</div>

