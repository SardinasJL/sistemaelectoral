<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap.css")}}">

    <title>Sistema Electoral</title>
</head>
<body>

@include("partials.navbar")

<div class="container">

    @yield("content")

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ url("assets/bootstrap/js/jquery-3.5.1.js") }}"></script>
<script src="{{ url("assets/bootstrap/js/popper.js") }}"></script>
<script src="{{ url("assets/bootstrap/js/bootstrap.js") }}"></script>

@yield("script")

</body>
</html>
