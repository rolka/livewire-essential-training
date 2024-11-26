<div>
    <form wire:submit="search">
        <input class="text-black" type="text" wire:model.live="query">
        <div>Number of users:
            <input class="text-black" type="number" wire:model.live="numberOfUsers">
        </div>
        {{--<button class="bg-gray-50" type="submit">Search</button>--}}
    </form>
    <div>
        @error('query')
        {{ $message }}
        @enderror
    </div>
    <ul>
        @foreach( $users as $user )
            <livewire:user-display :$user :key="$user->id">
{{--            <li>--}}
{{--                {{ $user->name }}--}}
{{--            </li>--}}
        @endforeach
    </ul>
    {{ $users->links() }}
</div>

