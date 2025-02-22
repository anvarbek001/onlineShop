<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>{{ $title ?? 'BardShop' }}</title>
</head>

<body>
    <div class=".site-box">
        <div class="navbar">
            <h2>BadrShop</h2>
            <div class="nav-list">
                <ul id="list">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('stores') }}">Stores</a></li>
                    <li><a href="">Products</a></li>
                    <form class="nav_search">
                        <input type="text" name="q" id="search" placeholder="Search..."
                            data-search="{{ route('search') }}">
                        <i class="fa-solid fa-search"></i>
                    </form>
                </ul>
                @if (Route::has('login'))
                    <div class="login-box">
                        @auth
                            @if (auth()->user()->role == 'seller')
                                <a id="a" href="{{ route('account') }}">
                                    Account
                                </a>
                            @endif
                            <a href="{{ url('exit') }}">logout</a>
                        @else
                            <a id="a" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a id="a" href="{{ route('seller') }}">Seller Register</a>
                                <a id="a" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <div class="check">
                <i class="fa-solid fa-bars" id="btn"></i>
                <i class='fa-solid fa-x' id="cancel-btn"></i>
            </div>
        </div>
        {{-- <div class="categories">
            <ul>
                @foreach ($categories as $category)
                    <li>{{ $category->title }}</li>
                @endforeach
            </ul>
        </div> --}}
        @if (session('success'))
            <div class="alert alert-primary">{{ session('success') }}</div>
        @endif
        {{ $slot }}

        <div class="footer">
            <div class="footer-items-list">
                <div class="footer-item">
                    <h6>About</h6>
                    <a href="">vacancy</a>
                </div>
                <div class="footer-item">
                    <h6>For entrepreneurs</h6>
                    <a href="">Seller in Badr</a>
                </div>
                <div class="footer-item social">
                    <h6>Social networks</h6>
                    <a class="telegram" href=""><i class="fa-brands fa-telegram"></i></a>
                    <a class="instagram" href=""><i class="fa-brands fa-instagram"></i></a>
                    <a class="youtube" href=""><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-license">
                <a href="">Privacy Policy</a>
                <a href="">User Agreement</a>
                <p>«2025© OOO «BadrShop». ИНН 309376127. All rights reserved»</p>
            </div>
        </div>
        <ul id="searchResults"
            style="position:absolute; z-index:1000; background: white; list-style: none; margin-top: 10px;">
            <!-- Bu yerga natijalar kiritiladi -->
        </ul>
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
    <script>
        $(document).ready(function() {
            let searchTimeout;

            $("#search").on('keyup', function() {
                clearTimeout(searchTimeout);

                var _q = $(this).val().trim();
                var searchUrl = $(this).data('route'); // HTML atributdan URL olish

                if (_q.length >= 3) {
                    searchTimeout = setTimeout(function() {
                        $.ajax({
                            url: searchUrl,
                            type: "GET",
                            data: {
                                q: _q
                            },
                            dataType: "json",
                            beforeSend: function() {
                                $('.products-list').html('<p>Loading...</p>');
                            },
                            success: function(response) {
                                $('.products-list').html(response.html);
                            },
                            error: function() {
                                $('.products-list').html(
                                    '<p>Error while searching</p>');
                            }
                        });
                    }, 500);
                } else {
                    $('.products-list').html('');
                }
            });
        });


        let alertRegis = document.querySelector('.alert-primary');

        setTimeout(() => {
            if (alertRegis) {
                alertRegis.style.display = 'none';
            }
        }, '5000');
    </script>

    <script src="./js/app.js"></script>

</body>


</html>
