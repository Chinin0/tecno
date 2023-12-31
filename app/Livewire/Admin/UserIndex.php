<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class UserIndex extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }


    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('livewire.admin.user-index', compact('users'));

        //dd($this->suggestions);
    }
    
}
