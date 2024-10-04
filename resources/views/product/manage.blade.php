@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Manage Products</h1>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                {{ $message }}
            </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('product.add')}}" class="btn btn-success">Add New Product</a>
    </div>

    <table class="table table-hover table-bordered">
        <thead class="table-light">
            <tr>
                <th>SL NO</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>

@foreach($products as $product)
<tbody>
    <tr>
        <td>{{ $loop->iteration }}</td> <!-- Corrected iteration -->
        <td>{{ $product->title }}</td>
        <td>{{ $product->description }}</td>
        <td>
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->title }}" width="50">
            @endif
        </td>
        <td>
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
            </form>
        </td>
        
    </tr>
</tbody>
@endforeach


    </table>
</div>
@endsection
