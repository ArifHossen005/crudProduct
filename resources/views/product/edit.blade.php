@extends('dashboard')

@section('content')
    <h1 class="text-center">Edit Product</h1>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
                <!-- Square box -->
                <div class="square-box p-4">
                    <form action="{{route('product.update',$product)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <!-- Title Input -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="" required>
                        </div>

                        <!-- Description Input -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>

                        <!-- Image Input -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image">

                            <p>Current Image:</p>
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->title }}" width="50">
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .square-box {
            width: 100%;
            max-width: 500px;
            height: 500px;
            background-color: #f8f9fa; /* Light grey background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
@endsection
