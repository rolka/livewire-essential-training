<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePost extends Component
{
    public string $coin = 'Starting value';
    public string $last = '';
    public function render()
    {
        return view('livewire.create-post');
    }
    public function mount()
    {
        $this->flip();
    //     $this->coin = rand(0, 1) ? 'Head' : 'Tails';
    }

    public function placeholder()
    {
        return '<div>Loading...</div>';
    }
    public function flip()
    {
        // sleep(3);
        $this->last = $this->coin;
        $this->coin = rand(0, 1) ? 'Head' : 'Tails';
    }
}

