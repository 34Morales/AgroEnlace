<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AgroEnlace</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #F9FBE7;
        }

        .navbar-agro {
            background-color: #2E7D32;
        }

        .navbar-agro a {
            color: white !important;
            font-weight: bold;
            margin-right: 15px;
        }

        .btn-agro {
            background-color: #2E7D32;
            color: white;
        }

        .btn-agro:hover {
            background-color: #66BB6A;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-agro p-3">
    <div class="container">
        <a href="/" class="text-white fw-bold">🌾 AgroEnlace</a>

        <div>
            <a href="/dashboard">Dashboard</a>
            <a href="/products">Productos</a>
            <a href="/products/create">Publicar</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    {{ $slot }}
</div>

</body>
</html>