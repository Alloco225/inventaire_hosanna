@extends("layouts.app")

@section("content")
    <x-subheader title="Liste des utilisateurs" subtitle="Gestion des utilisateurs"/>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">

                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/metronic/theme/html/demo1/dist/assets/media/svg/shapes/abstract-1.svg)">
                    <!--begin::Body-->
                    <div class="card-body">
                        @include("layouts.icons.users-shield", ["size" => "4"])
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $adminCount }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Administrateurs</span>
                    </div>
                    <!--end::Body-->
                </div>

            </div>
            <div class="col-xl-6">

                <div class="card card-custom bg-info card-stretch gutter-b">

                    <div class="card-body">
                        @include("layouts.icons.users", ["size" => '4', "class" => "svg-icon-white"])
                        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ $managerCount }}</span>
                        <span class="font-weight-bold text-white font-size-sm">Gestionnaires</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 30-->
            </div>
        </div>
    </div>

    <livewire:users-table/>
@endsection
