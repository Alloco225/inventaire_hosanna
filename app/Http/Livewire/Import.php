<?php

namespace App\Http\Livewire;

use App\Imports\ArticleImport;
use App\Rules\ExcelRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{

    use WithFileUploads;
    public $file=null;

    public function createSubmit(){
        
    }
    public function create(){

if(!empty($this->file)){

    
    $this->validate(
        [
            'file' => ['required', new ExcelRule($this->file)],
        ]
        );

        
        
    Excel::import(new ArticleImport, $this->file);

    request()->session()->flash(
        'success',
        'les articles ont été ajoutés avec succès.'
    );

    return redirect()->route('article.index');
}


   


    }
    public function render()
    {
        
        return view('livewire.import');
    }
}
