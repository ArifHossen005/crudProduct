<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Center the nav items -->
            <ul class="navbar-nav mx-auto">
                <!-- Add Product -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.add')}}">Add Product</a>
                </li>
                
                <!-- manage Product -->

                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.show')}}">View Product</a>
                </li>
            
                <!-- Show Products -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.manage')}}">Manage Products</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



    
        @yield('content')
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
