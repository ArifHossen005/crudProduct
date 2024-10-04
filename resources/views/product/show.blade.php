@extends('dashboard')

@section('content')

<div class="container">
    <h2 class="my-4 text-center">Product Cards</h2> <!-- Heading above the cards -->
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm custom-card">
                <img src="{{ $product->image ? Storage::url($product->image) : asset('placeholder.jpg') }}" class="card-img-top" alt="{{ $product->title }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="" class="btn btn-primary">View Details</a> <!-- Button linking to the details page -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
