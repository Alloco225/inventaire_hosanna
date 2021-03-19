<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Inventorys</title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    @livewireStyles
    @yield("style")

</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">

    <a href="/">
        <img alt="Logo" src="/media/logos/logo-light.png" />
    </a>

    <div class="d-flex align-items-center">

        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>

        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>

        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
            <span class="svg-icon svg-icon-xl">
                @include("layouts.icons.user")
            </span>
        </button>
    </div>

</div>

<div class="d-flex flex-column flex-root" >

    <div class="d-flex flex-row flex-column-fluid page">
        @include("layouts.partials.sidebar")

        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            @include("layouts.partials.navbar")

            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                @yield("content")
            </div>
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">

                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">{{ date("Y") }}©</span>
                        <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Inventorys</a>
                    </div>
                    <div class="nav nav-dark">
                        <a href="#" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("layouts.partials.components._quick-panel")
@include("layouts.partials.components._user-panel")

<div id="kt_scrolltop" class="scrolltop">
    @include("layouts.icons.navigation")
</div>


<x-modal title="Ajouter une direction" id="modalDirection">
            <livewire:direction-form />
</x-modal>
<x-modal title="Modifier une direction" id="modalDirectionUpdate">
    <livewire:direction-form-update />
</x-modal>
<!-- appartement -->

<x-modal title="Ajouter un appartement" id="modalAppartement">
    <livewire:appartement-form />
</x-modal>
<x-modal title="Modifier un appartement" id="modalAppartementUpdate">
    <livewire:appartement-form-update />
</x-modal>

<x-modal title="Ajouter un site" id="modalSite">
            <livewire:site-form/>
        </x-modal>

        <x-modal title="Modifier un site" id="modalSiteUpdate">
            <livewire:site-form-update />
        </x-modal>


        <x-modal title="Modifier un etage" id="modalEtageUpdate">
        <livewire:etage-form-update />
    </x-modal>

   

    <x-modal title="Ajouter une piece" id="modalPiece">
    <!-- modal-site -->
        <livewire:piece-form />

        <!-- site:$site pas necessaire -->
    </x-modal>

    
    <x-modal title="Modifier une piece" id="modalEtagePiece">
        <livewire:piece-form-update />
    </x-modal>

    <x-modal title="Ajouter un article" id="modalArticle">
    <!-- modal-site -->
        <livewire:article-form />

        <!-- site:$site pas necessaire -->
    </x-modal>


    <x-modal title="Ajouter un article" id="modalArticleUpdate">
        <livewire:article-form-update />
    </x-modal>

    <x-modal title="Ajouter une piece" id="modalPiece2">
    <!-- modal-site -->
        @livewire('piece-form2')

        <!-- site:$site pas necessaire -->
    </x-modal>
 
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<script src="{{ asset('/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('/js/pages/widgets.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
@livewireScripts

@include("layouts.partials.utilities-scripts")
@yield("scripts")

</body>
</html>