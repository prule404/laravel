<?php

namespace Modules\Admins\App\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserDatatables extends Component
{
    use WithPagination;

    public $search = '';

    public function mount()
    {
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('admins::livewire.user-datatables', [
            'users' => User::where('name', 'like', '%' . $this->search . '%')->paginate(1),
        ]);
    }
}
