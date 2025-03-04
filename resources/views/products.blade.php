<x-layout>
    <x-slot name="title">
        Products
    </x-slot>
    <div class="categories">
        @foreach ($categories as $category)
            <a href="{{ route('categories', ['id' => $category->id]) }}">{{ $category->title }}</a>
        @endforeach
    </div>
    <div>
        <div class="products">
            @foreach ($posts as $post)
                <div class="product-box">
                    <div class="product-item">
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}"
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
                        </a>
                        <div class="product-icons">
                            <div class="heart"></div>
                            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    <div class="paginate">
        {{ $posts->links() }}
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            e.preventDefault()
            let hearts = document.querySelectorAll('.heart');

            hearts.forEach(heart => {
                heart.addEventListener('click', () => {
                    heart.classList.toggle('active');
                });
            });
        });
    </script>

    <style>
        .heart.active {
            background-color: red;
        }
    </style>
</x-layout>
