<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Laravel</title>
</head>
<body>
    <body>
        <h1>Selamat Datang di Kelas Junior Web Programming</h1>
        <p>Materi Laravel</p>

        <a href="{{ route('penjumlahan') }}"> Penjumlahan </a>
        <a href="{{ route('pengurangan') }}"> Pengurangan </a>
        <a href="{{ route('pembagian') }}"> Pembagian </a>
        <a href="{{ route('perkalian') }}"> Perkalian </a>

        @yield('content')
    </body>
</body>
</html>