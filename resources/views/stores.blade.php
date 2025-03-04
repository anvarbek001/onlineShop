<x-layout>
    <x-slot name="title">
        Stores
    </x-slot>

    <div class="stores">
        @foreach ($stores as $store)
            <div class="stores-item">
                <a href="{{ route('store-products',['id' => $store->id]) }}">
                    <img src="{{ asset('storage/' . $store->photo) }}" alt="{{ $store->title }}">
                    <p class="store-name">{{ $store->title }}</p>
                    <p class="store-descr">{{ $store->description }}</p>
                    <p class="store-address">{{ $store->address }}</p>
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
