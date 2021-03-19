<!DOCTYPE html>
<html lang="fr">
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <title>Connexion | Inventorys</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div class="d-flex flex-column flex-root">

    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">

        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #f3f6f9;">

            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">

                <a href="#" class="text-center mb-10">
                    <img src=/media/logos/logo-letter-1.png" class="max-h-70px" alt="" />
                </a>

                <h2 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
                    Faire son inventaire
                    <br />devient <strong>facile.</strong></h2>
            </div>
            <div class="d-flex justify-content-center mt-10 bgi-no-repeat bgi-position-y-bottom bgi-position-x-center">
                <img src="{{ asset('/media/bg/login.svg') }}" alt="">
            </div>

        </div>

        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            @yield("content")

            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                    <span class="mr-1">{{ date("Y") }}©</span>
                    <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Inventorys</a>
                </div>
                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Nous contacter</a>
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>

</body>
</html>
