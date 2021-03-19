<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class ExcelRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $file;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function passes($attribute, $value)
    {
      
          $extension = strtolower($this->file->getClientOriginalExtension());


        return in_array($extension, ['csv', 'xls', 'xlsx']);
        

        
        
    }

    public function message()
    {
        return 'Le fichier excel doit être: csv, xls, xlsx.';
    }
}
