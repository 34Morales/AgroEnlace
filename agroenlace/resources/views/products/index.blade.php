@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-4">🌾 Productos disponibles</h1>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">

                <img src="https://via.placeholder.com/300x200" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>

                    <h4 class="text-success">$ {{ $product->price }}</h4>

                    <p class="text-muted">
                        📍 {{ $product->location }}
                    </p>

                    <a href="#" class="btn btn-agro w-100">
                        Ver / Comprar
                    </a>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection