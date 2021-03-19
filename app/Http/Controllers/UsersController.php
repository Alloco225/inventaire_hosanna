<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;

class UsersController extends Controller
{


    public function index()
    {
        $this->applyAdminGuard();

        $users = User::all(["is_admin"]);
        $adminCount = $users->filter(function($user) {
            return !! $user->is_admin;
        })->count();

        $managerCount = $users->filter(function($user) {
            return ! $user->is_admin;
        })->count();

        return view("utilisateurs.index", compact("adminCount", "managerCount"));
    }

    public function create()
    {
        return view("utilisateurs.create");
    }


    public function store(UserFormRequest $formRequest)
    {
        $this->applyAdminGuard();

        $user = User::create($formRequest->data());

        if(! $user->is_admin) {
            $user->sites()->attach($formRequest->site_ids ?? []);
        }

        return redirect()->route("utilisateurs.index")->with("success", "L'utilisateur a été créé avec succès");
    }



    public function edit($id)
    {
        $this->applyAdminGuard();

        $user = User::findOrFail($id);

        return view("utilisateurs.edit", compact("user"));
    }


    public function update(UserFormRequest $formRequest, $id)
    {
        $this->applyAdminGuard();

        $user = User::findOrFail($id);
        $user->update($formRequest->data());

        if($user->is_admin) {
            $user->sites()->detach();
        } else {
            $user->sites()->sync($formRequest->site_ids ?? []);
        }

        return redirect()->route("utilisateurs.index")
                        ->with("success", "L'utilisateur a été créé avec succès");
    }


    public function destroy(User $utilisateur)
    {
        $this->applyAdminGuard();

        $utilisateur->delete();

        return redirect()->route("utilisateurs.index")
                        ->with("success", "L'utilisateur a été supprimé avec succès");
    }

    protected function applyAdminGuard ()
    {
        if(! auth()->user()->is_admin) {
            abort(403);
        }
    }
}
