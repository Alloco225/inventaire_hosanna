@extends("layouts.app")

@section("content")
    <x-subheader title="Créér un utilisateur" subtitle="Gestion des utilisateurs"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            @include("utilisateurs.user-form", ["user" => null])
        </div>
    </div>
@endsection
