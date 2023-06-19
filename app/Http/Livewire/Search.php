<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.search', [
            'posts' => Post::where('title', 'like', '%' . $this->search . '%')
        ]);
    }
}
