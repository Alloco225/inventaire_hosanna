<?php

namespace App\Rules;

use App\Models\Site;
use Illuminate\Contracts\Validation\Rule;

class ValidSites implements Rule
{
    protected $siteIds = [];


    public function __construct(array $siteIds)
    {
        $this->siteIds = $siteIds;
    }


    public function passes($attribute, $value)
    {
        if($value !== "manager") {
            return true;
        }

        if(count($this->siteIds) === 0) {
            return true;
        }

        return Site::whereIn("id", $this->siteIds)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Certains des sites choisis sont invalides';
    }
}
