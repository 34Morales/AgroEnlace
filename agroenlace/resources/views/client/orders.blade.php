@extends('layouts.app')

@section('content')

<div class="container">

    <h1>📦 Mis pedidos</h1>

    <table class="table">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Status</th>
        </tr>

        @foreach($orders as $order)
        <tr>
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->status }}</td>
        </tr>
        @endforeach

    </table>

</div>

@endsection