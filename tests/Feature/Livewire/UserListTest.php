<?php

namespace Livewire;

use App\Livewire\UserList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserListTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserList::class)
            ->assertStatus(200);
    }
    public function test_pagination_works()
    {
        \App\Models\User::factory()->count(8)->create();
        \App\Models\User::factory()->create([ 'name' => 'Frank' ]);
        \App\Models\User::factory()->create([ 'name' => 'John' ]);
        \App\Models\User::factory()->create([ 'name' => 'Sally' ]);
        Livewire::test(UserList::class)
            ->assertSee('Frank')
            ->assertSee('John')
            ->assertDontSee('Sally');
        Livewire::withQueryParams(['users-list' => 2])
            ->test(UserList::class)
            ->assertSee('Sally')
            ->assertDontSee('Frank')
            ->assertDontSee('John');
    }

    public function test_search_works()
    {
        \App\Models\User::factory()->create([ 'name' => 'Gary' ]);
        \App\Models\User::factory()->create([ 'name' => 'Charlotte' ]);
        Livewire::test(UserList::class)
            ->set('query', 'Gary')
            ->assertSee('Gary')
            ->assertDontSee('Charlotte');

        \App\Models\User::factory()->create([ 'name' => 'Charlotte' ]);
        Livewire::test(UserList::class)
            ->set('query', '3')
            ->assertSee('Charlotte')
            ->assertSee('Gary')
            // ->assertDontSee('Charlotte')
            ->assertSee('The query field must only contain letters.');
    }
}

