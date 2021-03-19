<div class="col-12">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Liste des étages de {{ $site->nom_site }}</h3>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <div class="pt-2 pb-9">
                        <livewire:etage-table :site="$site" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 ">
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            @if($etage)
                                Liste des pièces de l'étage: {{ $etage->nom_etage }}
                               
                            @else
                                Aucun étage selectionné
                            @endif
                        </h3>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <div class="py-4">
                 
                        <livewire:piece-etage :etageId="$etageId" />
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12 col-md-12 m-5 mx-auto">
     
            <div class="card card-custom card-stretch">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                    Listes des articles
                               
                           
                        </h3>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <div class="py-4">
                    <livewire:article-table :piece="$piece"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
