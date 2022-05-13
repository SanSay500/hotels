<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="/styles/main.css" rel="stylesheet" type="text/css">

    @livewireStyles
</head>
<body>
    <header class="header bg-light">
        <div class="container">
            <nav class="navbar navbar-light">
                <a href="{{route('index')}}"
                    class="nav-item nav-link"> Main Page </a>

                <a href="{{ route('feedback.form') }}"
                class="nav-item nav-link ">Feedback</a>
                @guest
                    <a href="{{ route('login') }}"
                       class="nav-item nav-link">
                        <div class="picture-log"><img src="/images/acc_img.png"/></div></a>
                @endguest
                @auth
                    <a href="{{ route('home') }}"
                       class="nav-item nav-link">
                        <div class="picture-log"><img src="/images/acc_img.png"/></div></a>
                @endauth
            </nav>


        </div>
    </header>
    <section class="title">
        <a style="text-decoration: none;" href="{{ route('index') }}">
        <div class="container">
            <h1 class="my-3 text-center">Hotel Offers</h1>
        </div>
        </a>
    </section>
    @yield('main')



@livewireScripts

</body>
</html>
