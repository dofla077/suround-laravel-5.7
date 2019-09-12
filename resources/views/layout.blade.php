<!doctype html>
<html lang="en">
<head>
    <title>@yield('title', 'Dressrossa')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <style>
        .is-complete {
            text-decoration: line-through;
        }
    </style>
</head>
<body>

<!-- ><ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About us</a></li>
    <li><a href="/contact">Contact</a></li>
</ul> -->

<div class="container">
    @yield('content')
</div>

</body>
</html>
