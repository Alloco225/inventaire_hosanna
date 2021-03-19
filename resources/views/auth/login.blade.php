@extends('layouts.auth')

@section('content')
    <div class="d-flex flex-column-fluid flex-center">
        <!--begin::Signin-->
        <div class="login-form login-signin">

            <form class="form" novalidate="novalidate" id="kt_login_signin_form" method="POST"
                action="{{ route("login") }}"
            >
                @csrf
                <div class="pb-13 pt-lg-0 pt-5">
                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Bienvenue sur Inventorys</h3>
                    <span class="text-muted font-weight-bold font-size-h4">Se connecter</span>
                </div>
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark" for="username">Email</label>
                    <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="username"
                           autocomplete="off" id="username"
                           required="true"
                    />

                    @error("username")
                    <span class="text-danger font-weight-bold ">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between mt-n5">
                        <label class="font-size-h6 font-weight-bolder text-dark pt-5" for="password">Mot de passe</label>
                        <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Mot de passe oublié ?</a>
                    </div>
                    <input id="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg"
                           type="password" name="password" autocomplete="off"
                           required="true"
                    />
                </div>

                <div class="form-group">
                    <label class="checkbox font-weight-bolder text-dark ml-2">
                        <input type="checkbox" checked="checked" name="remember">
                        <span class="mr-2"></span>Se souvenir de moi</label>
                </div>


                <div class="pb-lg-0 pb-5">
                    <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Connexion</button>
                </div>

            </form>

        </div>
    </div>
@endsection
