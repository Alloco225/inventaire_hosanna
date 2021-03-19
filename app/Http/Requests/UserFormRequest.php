<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\ManagerTypeHasSite;
use App\Rules\ValidSites;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(): array
    {
        $rules = [
            "name" => ["required"],
            "username" => ["required"],
            "email" => ["nullable"],
            "password"  => [],
            "type"  => ["required", "in:manager,admin", new ValidSites($this->site_ids ?? [])]
        ];

        if ($this->method() === "POST") {
            $rules = $this->appendCreationRules($rules);
        }

        if($this->method() === "PUT") {
            $rules = $this->appendUpdateRules($rules);
        }

        return $rules;
    }

    public function data(): array
    {
        $attributes = [ "is_admin" => $this->type === "admin" ];
        $formAttributes = ["name", "username", "email", "is_admin"];

        if($this->method() === "POST" || ($this->method() === "PUT" && $this->password)) {
            $attributes["password"] = Hash::make($this->password);
            $formAttributes[] = "password";
        }

        return $this->merge($attributes)->all($formAttributes);
    }

    /**
     * @param array $rules
     * @return array
     */
    private function appendCreationRules(array $rules)
    {
        $rules["username"][] = "unique:users,username";
        $rules["email"][] = "unique:users,email";
        $rules["password"][] = "required";

        return $rules;
    }

    /**
     * @param array $rules
     * @return array
     */
    private function appendUpdateRules(array $rules)
    {
        $userId = $this->route('utilisateur');
        $user = User::findOrFail($userId);

        if ($user->username !== $this->username) {
            $rules["username"][] = "unique:users,username";
        }

        if ($user->email !== $this->email) {
            $rules["email"][] = "unique:users,email";
        }

        return $rules;
    }
}
