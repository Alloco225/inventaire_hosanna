<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            {{ $user ? "Modifier un utilisateur" : "Créer un utilisateur" }}
        </h3>
    </div>
    <form method="POST" action="{{ $user ? route("utilisateurs.update", $user) : route("utilisateurs.store") }}">
        @csrf
        @if($user)
            @method("PUT")
        @endif

        <div class="card-body">
            <div class="form-group mb-8">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon"><i class="flaticon-info text-primary"></i></div>
                    <div class="alert-text">
                        Ce formulaire vous permet de {{ $user ? "modifier": "créer" }} un utilisateur
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="name">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="name"
                               value="{{ $user ? $user->name : old("name") }}"
                               id="name"
                        />
                        @error("name")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="username"
                               value="{{ $user ? $user->username : old("username") }}"
                               id="username"
                        />
                        @error("username")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" class="form-control"  name="email"
                               value="{{ $user ? $user->email : old("email") }}"
                               id="email"
                        />
                        @error("email")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="password">Mot de passe </label>
                        <input type="text" class="form-control"  name="password"
                               value="{{ $user ? "" : old("password") }}"
                               id="password"
                        />
                        @error("password")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="type">Categorie</label>
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="type" value="admin" id="type_admin"
                                    @if($user)
                                        {{ $user->is_admin ? "checked": "" }}
                                    @else
                                        {{ old("type") === "admin" ? "checked" : ""}}
                                    @endif
                                >
                                <span></span>Administrateur
                            </label>
                            <label class="radio">
                                <input type="radio" name="type" value="manager" id="type_manager"
                                    @if($user)
                                        {{ $user->is_admin ? "": "checked" }}
                                        @else
                                        {{ old("type") === "manager" ? "checked" : ""}}
                                    @endif
                                >
                                <span></span>Gestionnaire
                            </label>
                        </div>
                        @error("type")
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group site-form-group">
                        <label for="site_id">Site</label>
                        <select class="form-control select" id="site_id" name="site_ids[]" multiple>
                            <option value=""></option>
                            @foreach($sites as $site)
                                <option value="{{ $site->id }}"
                                    @if($user)
                                        {{ $user->sites->contains($site->id) ? "selected": "" }}
                                    @else
                                        {{ in_array($site->id, old("site_ids") ?: []) ? "selected": "" }}
                                    @endif
                                >{{ $site->nom_site }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">
                {{ $user ? "Mettre à jour" : "Créer" }}
            </button>
        </div>
    </form>

</div>


@section("scripts")
    <script>
        $(".site-form-group").hide();
        var adminType = document.querySelector("#type_admin");
        var managerType = document.querySelector("#type_manager");

        if(managerType.checked){
            $(".site-form-group").slideDown();
        }

        adminType.addEventListener("change", function (event) {
            if(event.target.checked) {
                $(".site-form-group").slideUp();
            }
        })

        managerType.addEventListener("change", function (event) {
            if(event.target.checked) {
                $(".site-form-group").slideDown();
            }
        })
    </script>
@endsection
