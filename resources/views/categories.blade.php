<x-layout>
    <div>
        <h1 class="text-center">{{ $category->title }} </h1>
        <div>
            @foreach ($category->posts as $post)
                <div class="category-container">
                    <div class="category-box">
                        <div class="category-item">
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
                            </a>
                            <div class="category-icons">
                                <div class="heart"></div>
                                <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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

    </div>
</x-layout>
