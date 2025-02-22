<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/seller.css">
    <title>Document</title>
</head>

<body>
    <img src="./images/seller.png" alt="seller">
    <div class="row">
        <div class="col">
            <h3>Register as a seller</h3>
            <form action="{{ route('sellerRegister') }}" method="POST">
                @csrf
                <label>
                    Name
                    <input class="form-control" name="name" type="text" placeholder="Name..." required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    Store Name <span>(The name can be empty.)</span>
                    <input class="form-control" name="StoreName" type="text" placeholder="Store Name...">
                    @error('StoreName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    Email
                    <input class="form-control" name="email" type="email" placeholder="Email..." required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    Phone Number
                    <input class="form-control" name="phone" type="tel" placeholder="Phone Number..." required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    Password
                    <div class="input">
                        <input id="password" class="form-control" name="password" type="password"
                            placeholder="Password..." required>
                        <button type="button" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    Confirm Password
                    <div class="input">
                        <input id="password_confirmation" class="form-control" name="password_confirmation"
                            type="password" placeholder="Confirm Password..." required>
                        <button type="button" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </label>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
