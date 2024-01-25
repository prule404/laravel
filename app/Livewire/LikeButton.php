<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Component;

class LikeButton extends Component
{
    public $post;
    public $liked = false;

    public function mount($post)
    {
        $this->post = $post;
        $this->liked = $post->likedBy(auth()->user());
    }

    public function toggleLike()
    {
        if ($this->liked) {
            Like::where('user_id', auth()->id())->where('post_id', $this->post->id)->delete();
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'post_id' => $this->post->id,
            ]);
        }

        $this->liked = !$this->liked;
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
