@extends('layouts.app_livewire')


@section('content')

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
                        <form action="" id='form' method="POST">
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
                                        <th>Etat</th>
                                        <th>Qte Inventoriée</th>
                                        <th class="w-100">Site</th>
                                        <th>Etage</th>
                                        <th>Piece</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                            
                                @csrf
                                    @foreach($inventaires as $inventaire)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $inventaire->article->code_barre }}</td>
                                            <td>{{ $inventaire->article->nom }}</td>
                                            <td>{{ $inventaire->article->quantite }}</td>
                                         
                                            <td>{{ $inventaire->numero_inventaire }}</td>

                                            <td> <input type="hidden" name="code_barre.{{$inventaire->id}}" id="code_barre.{{$inventaire->id}}" value="{{$inventaire->article->code_barre}}"><textarea id="observation.{{$inventaire->id}}" name="observation.{{$inventaire->id}}">{{ $inventaire->observation }}</textarea></td>
                                            <td>
                                           
                                            <select name="etat.{{$inventaire->id}}" id="etat.{{$inventaire->id}}" class="select">
                                                <option value=""></option>
                                                @foreach ($etats as $etat)
                                                    <option value="{{$etat->id}}" >{{$etat->libelle}}</option>
                                                @endforeach
                                            </select>
                                                    <div class="text-danger" id="message"></div>
                                                    </td>
                                            <td><input type="number" class="form-control" id="quantity.{{$inventaire->id}}" name="quantity.{{$inventaire->id}}" value="{{ $inventaire->quantite }}"></td>
                                            <td class="w-100">
                                                
                                                   
                                                    <select id='site.{{$inventaire->id}}' name="site.{{$inventaire->id}}" class="select">
                                                        <option value="">Slectionner</option>
                                                        @foreach ($sites as $site)
                                                            <option value="{{$site->id}}">{{$site->nom_site}}</option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </td>
                                            <td>
                                            
                                            <select  id='etage.{{$inventaire->id}}' name="etage.{{$inventaire->id}}">
                                            <option value="">Selectionner</option>
                                                       
                                                    </select>
                                            
                                            </td>
                                            <td>
                                            

                                            <select id="piece.{{$inventaire->id}}" name="piece.{{$inventaire->id}}">
                                            <option value="">Selectionner</option>
                                                     
                                                    
                                                    </select>
                                            
                                            <input type="hidden" name="numero_inventaire.{{ $inventaire->id }}" id="numero_inventaire.{{ $inventaire->id }}" value="{{$inventaire->numero_inventaire}}">
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="float-right btn btn-lg btn-success"><i class="fas fa-dolly-flatbed"></i>Valider</button>
                            </form>
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


@endsection
@section('scripts')

<script type="text/javascript">
$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    $(document).ready(function () {
        $('select[id^=site]').on('change',function(e) {
           var site_html_id = $(this).attr("id");
           var newValue = site_html_id.replace('site.', '');
         console.log(newValue);
   
            var site_id = e.target.value;
            $.ajax({
                url:"{{ route('etage') }}",
                type:"POST",
                data: {
                site_id: site_id
                },
                success:function (data) {
                   
                    var t= document.getElementById('etage.'+newValue);
                    t.innerHTML ="";
                    t.innerHTML =  '<option value="">Selectionner</option>';
                        $.each(data.etages,function(index,etage){
                       
                        
                        t.innerHTML += '<option value="'+etage.id+'">'+etage.nom_etage+'</option>';
                     
                        })
                }
            })
        });

       
          
        $('select[id^=etage]').on('change',function(e) {
           var etage_html_id = $(this).attr("id");
           var etage_html_id_new = etage_html_id.replace('etage.', '');
           var etage_id = e.target.value;
            console.log(etage_html_id_new);
            $.ajax({
                url:"{{ route('piece') }}",
                type:"POST",
                data: {
                etage_id: etage_id
                },
                success:function (data) {
                    
                    var p= document.getElementById('piece.'+etage_html_id_new);
                    p.innerHTML ="";
                        $.each(data.pieces,function(index,piece){
                            p.innerHTML +=' <option value="'+piece.id+'">'+piece.nom_piece+'</option>';
                        })
                }
            })
        });

        $('#form').submit(function( event ) {
            event.preventDefault();
            var datas = $(this).serializeArray();
           
            var everythingIsOk = true;
            
          console.log(datas);
          //remove etage_id not required

          $.each(datas, function (i, field) {
            if(field.value==''){
             
                let message = document.getElementById(field.name);
                console.log(message)
                let parent= message.parentNode;
               
               
                let child = document.createElement('div');
                child.className = 'text-danger';
           
                child.innerHTML = 'le champs '+ field.name +' doit être rempli';
             
                parent.appendChild(child);
           
                everythingIsOk = false;

            }
            });
           
            if(everythingIsOk){

           
            $.ajax({
                url:"{{ route('inventaire') }}",
                type:"POST",
                data:  {
                data: datas
                },
                success:function (data) {

                    Swal.fire({
                        title: "Inventaire reussi",
                        text: "Votre inventaire a été validé avec success",
                        icon: "success",
                    }).then(function(result) {
                        if (result.value) {
                            window.location.replace('/article');
                        }
                    });
                    console.log(data)
                }
            })

        }
           


        });
});
</script>
@endsection
