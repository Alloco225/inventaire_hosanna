@extends("layouts.app_livewire")

@section("content")
    <x-subheader title="{{ $site->nom_site }}" subtitle="Gestion des sites"/>

    <div class="container">
        <div class="row">
            <livewire:site-details :site="$site"/>
        </div>
    </div>
@endsection
