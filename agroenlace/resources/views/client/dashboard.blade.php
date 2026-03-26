@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">🛒 Marketplace</h1>

    <!-- ✅ MENSAJES -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- 🔎 BUSCADOR -->
    <form method="GET" class="mb-4">
        <input type="text" name="search" class="form-control" placeholder="Buscar producto...">
    </form>

    <!-- BOTÓN PEDIDOS -->
    <a href="/my-orders" class="btn btn-agro mb-4">📦 Ver mis pedidos</a>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">

                <img src="https://via.placeholder.com/300x200" class="card-img-top">

                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold">{{ $product->name }}</h5>
                    
                    <p class="text-muted">{{ $product->description }}</p>

                    <p><strong>📍 Ubicación:</strong> {{ $product->location }}</p>

                    <p><strong>📦 Stock:</strong> {{ $product->quantity }}</p>

                    <h4 class="text-success">$ {{ $product->price }}</h4>

                    @if($product->quantity > 0)
                        <form method="POST" action="{{ route('client.buy') }}" class="mt-auto">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <input 
                                type="number" 
                                name="quantity" 
                                class="form-control mb-2" 
                                placeholder="Cantidad" 
                                min="1" 
                                max="{{ $product->quantity }}" 
                                required
                            >

                            <button class="btn btn-success w-100">
                                🛒 Comprar
                            </button>
                        </form>
                    @else
                        <button class="btn btn-secondary w-100 mt-auto" disabled>
                            Sin stock
                        </button>
                    @endif

                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection