@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>🌱 Publicar producto</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <input class="form-control mb-2" type="text" name="name" placeholder="Nombre">
        <textarea class="form-control mb-2" name="description"></textarea>
        <input class="form-control mb-2" type="number" name="price" placeholder="Precio">
        <input class="form-control mb-2" type="number" name="quantity" placeholder="Cantidad">
        <input class="form-control mb-2" type="text" name="location" placeholder="Ubicación">

        <button class="btn btn-agro">Guardar</button>
    </form>
</div>
@endsection