<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('pageTitle') | Palcomtech</title>
    @include('partials.style')

</head>

<body id="page-top">
    <div id="wrapper" class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        @yield('content')
    </div>
    @include('partials.script')
</body>

</html>
