<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Bengkel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>

        body{

            background: linear-gradient(135deg,#0d6efd,#6ea8fe);

            height:100vh;

            display:flex;

            align-items:center;

            justify-content:center;

        }

        .card{

            border-radius:20px;

        }

        .logo{

            width:90px;

            height:90px;

            border-radius:50%;

            background:white;

            display:flex;

            justify-content:center;

            align-items:center;

            margin:auto;

            box-shadow:0 5px 20px rgba(0,0,0,.2);

        }

        .btn-primary{

            border-radius:12px;

        }

    </style>

</head>

<body>

<div class="container">

    @yield('content')

</div>

</body>

</html>