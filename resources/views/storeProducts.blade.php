<x-layout>
    <div>
        <h3 class="text-center">{{ $store->title }}</h3>
        <div>
            <div class="products">
                @foreach ($posts as $post)
                    <div class="product-box">
                        <div class="product-item">
                            <a href="{{ route('posts.show', ['date'=>$post->created_at->format('Y-m-d'),'slug'=>$post->slug]) }}"
                                style="text-decoration: none; color:black;">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}">
                                </div>
                                <div style="padding: 5px;">
                                    <p><strong>{{ $post->title }}</strong></p>
                                    <p>{{ $post->short_content }}</p>
                                    <del>{{ number_format($post->price * 2.79) }} so'm</del>
                                    <p style="margin-top: 3px; font-weight:bold;">{{ number_format($post->price) }}
                                        so'm</p>
                                </div>
                        </div>
                        </a>
                        <div class="product-icons">
                            <div class="heart"></div>
                            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
