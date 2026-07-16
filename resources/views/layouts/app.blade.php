<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Sistem Informasi Bengkel Maju Motor')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>

        body{
            background:#f4f6f9;
        }

        .main-content{
            margin-left:250px;
            min-height:100vh;
        }

        .content-area{
            padding:25px;
        }

        .sidebar a{
            transition:.3s;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,.2);
            padding-left:30px;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 3px 12px rgba(0,0,0,.08);
        }

    </style>

</head>

<body>

@include('components.sidebar')

<div class="main-content">

    @include('components.navbar')

    <div class="content-area">

        @yield('content')

    </div>

</div>

</body>
</html>