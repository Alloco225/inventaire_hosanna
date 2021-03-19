<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Imports\ArticleImport;
use App\Imports\InventaireImport;
use App\Rules\ExcelRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Inventaire extends Component
{

    use WithFileUploads;
    public $file=null;


    public function createSubmit(){

    }


    public function create()
    
    {

            if(!empty($this->file)){

                
                $this->validate(
                    [
                        'file' => ['required', new ExcelRule($this->file)],
                    ]
                    );
                   
             Excel::import(new InventaireImport, $this->file);

                request()->session()->flash(
                    'success',
                    'les articles inventoriés ont été ajoutés avec succès.'
                );

                return redirect()->route('inventaire.preload');
            }


    }
    public function render()
    {
        return view('livewire.inventaire');
    }
}

