<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="/styles/main.css" rel="stylesheet" type="text/css">
    @livewireStyles
</head>
<body>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a href="{{route('index')}}"
             class="navbar-brand mr-auto"> Main Page </a>
        @guest
        <a href="{{ route('register') }}"
           class="nav-item nav-link ">Register</a>
        <a href="{{ route('login') }}"
           class="nav-item nav-link">Login</a>
        @endguest
        @auth
            <a href="{{ route('home') }}"
               class="nav-item nav-link">My Account</a>
        <form action="{{ route('logout') }}" method="POST"
              class="form-inline">
            @csrf
            <input type="submit" class="btn btn-danger"
                   value="Logout">
        </form>
         @endauth
    </nav>
    <h1 class="my-3 text-center">Hotel Offers</h1>
    @yield('main')
</div>


@livewireScripts

</body>
</html>
