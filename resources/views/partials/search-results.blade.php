@foreach ($posts as $post)
    <a href="{{ route('posts.show', ['id' => $post->id]) }}" style="text-decoration: none; color:black;">
        <div class="products">
            <div class="product-box">
                <div class="product-item">
                    <div class="img-box">
                        <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}">
                    </div>
                    <div style="padding: 5px;">
                        <p><strong>{{ $post->title }}</strong></p>
                        <p>{{ $post->short_content }}</p>
                        <del>{{ number_format($post->price * 2.79) }} so'm</del>
                        <p style="margin-top: 3px; font-weight:bold;">{{ number_format($post->price) }} so'm</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
@endforeach
