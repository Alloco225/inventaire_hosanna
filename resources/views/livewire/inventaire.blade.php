<div>
<div class="container">

<h2>Fichier d'inventaire à importer   @include("layouts.icons.excel")  </h2>

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
                                        <a href="{{route('exports.etage.print')}}" class="navi-link">
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
                                        <a href="{{route('exports.inventaire.excel')}}" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
                                            <span class="navi-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="{{route('exports.inventaire.excel')}}" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-text-o"></i>
																</span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="{{route('exports.etage.pdf')}}" class="navi-link">
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
                    </div>

<p class="mb-5">
    Le fichier doit être de type csv ou xlsx. <br>
    Le fichier doit avoir exactement les mêmes entêtes que les noms des champs de la base <br>
    de donnée. 
    <span class="text-danger text-bold"> Un exemple de fichier à importer se trouve dans le dossier import du projet</span>
</p>

    <div class="mx-auto">
        <form  method="POST"  wire:submit.prevent="createSubmit" enctype="multipart/form-data">
            @csrf
            <div class="row mt-2">


                    
           
                <div class="form-group col-md-6">
                    <label>Choisir un fichier</label>

                    <div
                x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <!-- File Input -->
              
                <input type="file"  class="form-control" id="" wire:model='file'>

                <!-- Progress Bar -->
                <div x-show="isUploading" style='display:none'>
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
                  
                    
                    @error("file")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    

                    
            </div>
                
                </div>
                <div class="form-group col-md-6">

                  
                
            
                </div>
             
                <button wire:click='create' class="btn btn-dark ml-4"  wire:loading.attr="disabled" wire:loading.class="border border-dark" wire:loading.class.remove="btn-dark" wire:click='transfert'><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
    Sauvegarder   <div wire:loading wire:target="create" >
                                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    </div>
</button>  

            </div>


        </form>
    </div>

    </div>
</div>
