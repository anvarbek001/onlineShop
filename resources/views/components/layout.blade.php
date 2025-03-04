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
    <link rel="stylesheet" href="/css/btncss.css">
    <style>
        .list-active {
            border-bottom: 1px solid black;
            color: black;
        }

        .heart.active {
            background-color: red;
        }
    </style>
    <title>{{ $title ?? 'BardShop' }}</title>
</head>

<body>
    <div class=".site-box">
        <div class="navbar">
            <h2>BadrShop</h2>
            <div class="nav-list">
                <ul id="list">
                    <li><a href="{{ url('/') }}"><span class="home">{{ __('Bosh Sahifa') }}</span></a></li>
                    <li><a href="{{ route('stores') }}"><span class="stores">{{ __("Do'konlar") }}</span></a></li>
                    <li><a href="{{ route('products') }}"><span class="products">{{ __('Mahsulotlar') }}</span></a></li>
                    <li>
                        <div class="dropdown">
                            <button style="border: none;" class="btn  dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ __('til') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($all_locales as $locale)
                                    <a href="{{ route('locale_change', ['locale' => $locale]) }}">
                                        {{ $locale }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <div class="cart-shopping">
                        <a href="{{ route('shopCart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    {{-- <form class="nav_search">
                        <input type="text" name="q" id="search" placeholder="Search..."
                            data-search="{{ route('search') }}">
                        <i class="fa-solid fa-search"></i>
                    </form> --}}
                </ul>
                @if (Route::has('login'))
                    <div class="login-box">
                        @auth
                            @if (auth()->user()->role == 'seller')
                                <a id="a" href="{{ route('account') }}">
                                    {{ __('Hisob') }}
                                </a>
                            @endif
                            <a href="{{ url('exit') }}">{{ __('Chiqish') }}</a>
                        @else
                            <a id="a" href="{{ route('login') }}">{{ __('Kirish') }}</a>

                            @if (Route::has('register'))
                                <a id="a" href="{{ route('seller') }}">{{ __('Badr sotuvchisi') }}</a>
                                <a id="a" href="{{ route('register') }}">{{ __("Ro'yxatdan o'tish") }}</a>
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

        <div>
            @if (session('success'))
                <div class="alert alert-primary">{{ session('success') }}</div>
            @endif

            {{ $slot }}
        </div>

        <div class="footer">
            <div class="footer-items-list">
                <div class="footer-item">
                    <h6>{{ __('Biz haqimizda') }}</h6>
                    <a href="">{{ __('Vakansiya') }}</a>
                </div>
                <div class="footer-item">
                    <h6>{{ __('Tadbirkorlar uchun') }}</h6>
                    <a href="">{{ __('Badrda sotuvchi') }}</a>
                </div>
                <div class="footer-item social">
                    <h6>{{ __('Ijtimoiy tarmoqlar') }}</h6>
                    <a class="telegram" href=""><i class="fa-brands fa-telegram"></i></a>
                    <a class="instagram" href=""><i class="fa-brands fa-instagram"></i></a>
                    <a class="youtube" href=""><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-license">
                <a href="">{{ __('Maxfiylik siyosati') }}</a>
                <a href="">{{ __('Foydalanuvchi shartnomasi') }}</a>
                <p>«2025© OOO «BadrShop». ИНН 308376127. All rights reserved»</p>
            </div>
        </div>
        {{-- <ul id="searchResults"
            style="position:absolute; z-index:1000; background: white; list-style: none; margin-top: 10px;">
            <!-- Bu yerga natijalar kiritiladi -->
        </ul> --}}
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
    <script src="./js/script.js"></script>
    <script>
        let navLinks = document.querySelectorAll("#list li a");

        navLinks.forEach(link => {
            link.addEventListener("click", function(e) {
                // Barcha aktiv klasslarni o‘chirish
                navLinks.forEach(l => l.classList.remove("list-active"));

                // Bosilgan elementga aktiv klass qo‘shish
                this.classList.add("list-active");

                // Brauzerning default harakatini saqlash (sahifaga o'tish)
                window.location.href = this.href;
            });
        });

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



</body>


</html>
