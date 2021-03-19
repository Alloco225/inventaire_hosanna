@extends("layouts.app")

@section("content")
    <x-subheader title="Modifier un utilisateur" subtitle="Gestion des utilisateurs"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            @include("utilisateurs.user-form", ["user" => $user])
        </div>
    </div>
@endsection
