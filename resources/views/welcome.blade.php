<x-layout>
    <x-slot name="title">
        Home
    </x-slot>
    <div class="categories">
        @foreach ($categories as $category)
            <a href="{{ route('categories', ['id' => $category->id]) }}">{{ $category->title }}</a>
        @endforeach
    </div>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./images/seller.png" style="height: 300px; object-fit: cover; border-radius:15px;" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/seller.png" style="height: 300px; object-fit: cover; border-radius:15px;" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/seller.png" style="height: 300px; object-fit: cover; border-radius:15px;" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div>
        <div class="products-list">
            @foreach ($posts as $post)
                <div class="products">
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
                            </a>
                            <div class="product-icons">
                                <div class="heart"></div>
                                <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
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
