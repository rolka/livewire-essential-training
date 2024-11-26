<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    public int $numberOfUsers = 10;
    #[Validate]
    public string $query = '';
    #[On('delete-user')]
    public function render()
    {
        $query = $this->query;
        $numberOfUsers = $this->numberOfUsers;
        if ( ! empty($this->getErrorBag()->get('query')) ) {
            // $this->query = '';
            $query = '';
        }
        return view('livewire.user-list', [
            // 'users' => \App\Models\User::paginate( 10, pageName: 'users-list' ),
            'users' =>
                \App\Models\User::where( 'name', 'like', '%' . $query . '%' )->paginate( $numberOfUsers, pageName: 'users-list' ),
        ]);
    }
    public function search()
    {
        $this->resetPage();
    }
    public function rules()
    {
        return [
            'query' => 'alpha',
        ];
    }
}

// create some new users in tinker
// \App\Models\User::factory()->count(30)->create()

// https://www.linkedin.com/learning/livewire-essential-training/next-steps?autoSkip=true&resume=false
