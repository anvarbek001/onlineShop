<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container {
            padding: 20px 0px;
        }

        .box{
            background: rgb(224, 223, 223);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgb(115, 115, 115);
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <form id="editForm" method="POST" action="{{ route('update', ['id' => $post->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="postId" name="id">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="short_content">Short Content</label>
                    <textarea class="form-control" id="short_content" rows="1" name="short_content">{{ $post->short_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $post->price }}">
                </div>
                <div class="form-group">
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <div class="form-group">
                        <label for="file-upload" class="col-form-label custom-file-upload">
                            <i class="fa fa-cloud-upload"></i>
                            Photo
                        </label>
                        <input type="file" class="form-control" name="photo" id="file-upload" value="{{ $post->photo }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</body>

</html>
