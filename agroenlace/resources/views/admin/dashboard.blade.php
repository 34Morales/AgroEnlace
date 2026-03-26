@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">🧑‍💼 Panel Administrador</h1>

    <!-- 📊 GRÁFICA -->
    <h3>📊 Estadísticas</h3>
    <canvas id="myChart" height="100"></canvas>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Usuarios', 'Productos', 'Pedidos'],
                datasets: [{
                    label: 'Cantidad',
                    data: [
                        {{ $totalUsers }},
                        {{ $totalProducts }},
                        {{ $totalOrders }}
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>

    <!-- 👤 USUARIOS -->
    <h3 class="mt-5">👤 Usuarios</h3>

    <!-- 🔎 Filtro usuarios -->
    <form method="GET" class="mb-3">
        <select name="role" class="form-control">
            <option value="">Todos</option>
            <option value="admin">Admin</option>
            <option value="seller">Seller</option>
            <option value="buyer">Buyer</option>
        </select>
        <button class="btn btn-agro mt-2">Filtrar</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acción</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- 🌽 PRODUCTOS -->
    <h3 class="mt-5">🌽 Productos</h3>

    <!-- 🔎 Filtro productos -->
    <form method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Buscar producto" class="form-control">
        <button class="btn btn-agro mt-2">Buscar</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Ubicación</th>
            <th>Acción</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->location }}</td>
            <td>
                <form method="POST" action="{{ route('admin.deleteProduct', $product->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- 📦 PEDIDOS -->
    <h3 class="mt-5">📦 Pedidos</h3>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->status }}</td>
        </tr>
        @endforeach
    </table>

</div>

@endsection