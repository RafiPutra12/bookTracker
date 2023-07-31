<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    @vite('resources/sass/app.scss')
    @vite('resources/css/style.css')
    @vite('resources/js/script.js')
    <title>BookTracker</title>
  </head>
  <body>

    <!-- header section starts -->

    <header class="header">

        <a href="#" class="logo">
            <img src="{{ Vite::asset('resources\images\bt.png') }}" alt="">
        </a>

        <nav class="navbar">
            <div id="close" class="fas fa-times"></div>

            <a href="#" class="nav_item">home</a>
            <a href="#" class="nav_item">books</a>
            <a href="#" class="nav_item">about</a>
            <a href="#" class="nav_item">contact</a>

        </nav>

        <div id="menu" class="fas fa-bars"></div>

    </header>

    <!-- header section ends -->

    <!-- home section starts -->

    <section class="home">

        <div class="content">
            <h1 class="title">Baca <span>buku</span> dengan <span>mudah</span> </h1>
            <p class="description">Perpustakaan disajikan dengan mudah, daftar akunmu sekarang dan mulailah membaca!</p>
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>

        <div class="image">
            <img src="{{ Vite::asset('resources\images\moving.png') }}" alt="" data-speed="-3" class="move">
        </div>

    </section>

    <!-- home section ends -->

    <!-- GSAP CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>


  </body>
</html>
