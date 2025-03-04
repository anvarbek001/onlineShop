<x-layout>
    <x-slot name="title">
        Stores
    </x-slot>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="stores">
        @foreach ($stores as $store)
            <div class="stores-item">
                <a href="{{ route('store-products', ['id' => $store->id]) }}">
                    <img src="{{ asset('storage/' . $store->photo) }}" alt="{{ $store->title }}">
                    <p class="store-name">{{ $store->title }}</p>
                    <p class="store-descr">{{ $store->description }}</p>
                    <p class="store-address">{{ $store->address }}</p>
                </a>
                <div class="store-btn d-flex">
                    <a type="button" class="btn btn-outline-success" href="">Tahrirlash</a>
                    <form action="{{ route('storeDelete', ['id' => $store->id]) }}"
                        onsubmit="confirm('Haqiqatan ham do\'konni o\'chirmoqchimisiz?')" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">O'chirish</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
