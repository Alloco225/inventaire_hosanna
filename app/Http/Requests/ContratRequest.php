<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nom" => "required",
            "cout" => "required|numeric",
            "duree_site" => "required|numeric",
            "periode_duree_site" => "required|in:0,1",
            "duree" => "required|numeric",
            "periode_duree" => "required|in:0,1",
            "date_effet" => "required|date",
            "preavis" => "required|numeric",
            "echeance" => "required|date",
            "echeance_site" => "required|date",
            "observation" => "required"
        ];
    }

    public function data() : array
    {
        return [
            "nom" => $this->nom,
            "cout" => $this->cout,
            "duree_site" => $this->duree_site,
            "periode_duree_site" => !! $this->periode_duree_site,
            "duree" => $this->duree,
            "periode_duree" => $this->periode_duree,
            "date_effet" => $this->date_effet,
            "preavis" => $this->preavis,
            "echeance" => $this->echeance,
            "echeance_site" => $this->echeance_site,
            "observation" => $this->observation
        ];
    }
}
