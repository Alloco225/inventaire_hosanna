<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::with('sites')->paginate(1);
     
        return view('livewire.users-table', [
            "users" =>$users
        ]);
    }
}
