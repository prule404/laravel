<?php

namespace Modules\Admins\App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PostDatatables extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('admins::livewire.post-datatables', [
            'posts' => Post::where('title', 'like', '%' . $this->search . '%')->paginate(1),
        'count' => Post::count(),
        ]);
    }
}
