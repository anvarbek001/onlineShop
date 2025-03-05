<x-layout>
    <x-slot name="title">Product show</x-slot>
    <div class="showBox">
        {{-- <p>Created: <span>{{ $post->created_at->format('Y-m-d') }}</span></p> --}}
        <div class="img">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('storage/' . $post->photo) }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('storage/' . $post->photo) }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('storage/' . $post->photo) }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('storage/' . $post->photo) }}" alt="Third slide">
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
        <div class="item">
            <div class="post-title">
                <h3>{{ $post->title }}</h3>
                <a type="button" class="btn btn-primary" href="">Add to Cart <i
                        class="fa-solid fa-cart-shopping"></i> </a>
            </div>
            <div class="content">
                <p>{{ $post->content }}</p>
            </div>
            <div class="price">
                <h2>{{ number_format($post->price) }} so'm</h2>
                <del>{{ number_format($post->price * 2.79) }} so'm</del>
            </div>
        </div>
    </div>
    <div class="comments-section">
        <div class="comments"></div>
    </div>
</x-layout>
