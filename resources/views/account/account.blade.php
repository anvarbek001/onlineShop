<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/account.css">
    <title>Document</title>
</head>

<body>
    <h3 class="text-center m-3">Welcome <span style="color: red; ">{{ auth()->user()->name }}</span></h3>
    <div class="box">
        <div class="acc_nav">
            <input type="text" class="form-control" placeholder="Search..." required>
            <button type="button" class="add btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
                product</button>
            <a type="button" href=""></a>
        </div>
        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        <div class="products-list">
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', ['id' => $post->id]) }}" style="text-decoration: none; color:black;">
                    <div class="products">
                        <div class="product-item">
                            <div class="img-box">
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}">
                            </div>
                            <p><strong>{{ $post->title }}</strong></p>
                            <p>{{ $post->short_content }}</p>
                            <p><strong>{{ $post->category->title }}</strong></p>
                            <del>{{ number_format($post->price * 2.79) }}</del>
                            <p style="margin-top: 3px; font-weight:bold;">{{ number_format($post->price) }} so'm
                            </p>
                            <div class="product-change">
                                <a type="button" class="edit" href="{{ route('edit',['id'=>$post->id]) }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('destroy', ['id' => $post->id]) }}" method="POST"
                                    onsubmit="return confirm('Haqiqatan ham ushbu postni o\'chirmoqchimisiz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="destroy"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="paginate">
            {{ $posts->links() }}
        </div>
    </div>


    {{-- Add Modal --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="recipient-name" required>
                            @error('title')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Short Content (max:60 characters)</label>
                            <textarea class="form-control" name="short_content" id="message-text" required></textarea>
                            @error('short_content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Conten (max:1000 characters)</label>
                            <textarea class="form-control" name="content" rows="5" id="message-text" required></textarea>
                            @error('content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="recipient-name" required>
                            @error('price')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex">
                            <div class="form-group">
                                <label for="photo_one" class="col-form-label custom-file-upload">
                                    <i class="fa fa-cloud-upload"></i>
                                    Photo
                                </label>
                                <input type="file" class="form-control" name="photo" id="photo" required>
                                <div class="progress-bar" id="progress-bar"></div>
                                @error('photo')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    {{-- @foreach ($posts as $post)
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}

    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     $(document).on("click", ".edit", function() {
        //         var id = $(this).data("id");
        //         var title = $(this).data("title");
        //         var content = $(this).data("content");
        //         var shortContent = $(this).data("short-content");
        //         var price = $(this).data("price");
        //         var category_id = $(this).data("category-id");
        //         var photo = $(this).data("photo"); // Oldin joylangan rasm manzili

        //         // Formni to'ldirish
        //         $("#postId").val(id);
        //         $("#title").val(title);
        //         $("#content").val(content);
        //         $("#short_content").val(shortContent);
        //         $("#price").val(price);
        //         $("#category_id").val(category_id);

        //         // Oldin joylangan rasmni ko'rsatish
        //         $("#currentPhoto").attr("src", "{{ asset('storage') }}/" + photo);

        //         // Fayl inputini tozalash (agar yangi rasm yuklanmasa, oldingi rasm saqlanadi)
        //         $("#file-upload").val("");

        //         // Formning action URL ni to'g'ri o'rnatish
        //         $("#editForm").attr("action", "{{ route('update', ['id' => 'id']) }}/" + id);
        //     });
        // });

        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')

            var modal = $(this)
            modal.find('.modal-title').text('New message to ')
            modal.find('.modal-body input').val()
        })

        document.querySelector('form').addEventListener('submit', function(event) {
            console.log('Form submitted');
        });

        let alert = document.querySelector('.alert-success');
        setTimeout(() => {
            if (alert) {
                alert.style.display = "none";
            }
        }, "5000");
    </script>

    <script src="./js/account.js"></script>
</body>

</html>
