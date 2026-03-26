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

        .card {
            border-radius: 10px;
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

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        
        <div class="text-center mb-3">
            <h2 style="color:#2E7D32;">🌾 AgroEnlace</h2>
            <p>Marketplace agrícola</p>
        </div>

        {{ $slot }}

    </div>
</div>

</body>
</html>