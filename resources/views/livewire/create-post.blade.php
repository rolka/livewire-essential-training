<div wire:poll.keep-alive.visible.5s="flip">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <p>Hello from livewire: {{ $coin }}</p>
{{--    <p wire:click="flip">Click me</p>--}}

    <h1>Last flip: {{ $last }}</h1>
    <form wire:submit="flip">
        <button type="submit" class="border border-2 border-white">Flip it</button>
    </form>

</div>

