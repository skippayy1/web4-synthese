<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="m-2 pl-2 navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('admin.home') }}">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.news') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products') }}">Products</a>
                </li>
            </ul>
            <form action="{{route('admin.logout')}}" method="POST" class="ms-auto my-2 my-lg-0">
                @csrf
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container products">
        <h2>Products</h2>
        <div class="list row">
            @if (empty($products))
                <h3>Aucuns produits</h3>
            @endif
            @foreach ($products as $product)
                <div class="item card col m-3">
                    <h3>Title: {{ $product->title }}</h3>
                    <div class="description">
                        @if ($product->img_url1 != null)
                            <div class="overflow-hidden object-fit-contain d-flex align-items-center justify-content-center"
                                style="height: 382px;"><img style="object-position: center;"
                                    src="{{ asset($product->img_url1) }}" alt=""></div>
                        @endif
                        <p>Description: {{ $product->description }}</p>
                        <p>Feature 1: {{ $product->feature1 }}</p>
                        <p>Feature 2: {{ $product->feature2 }}</p>
                        <p>Feature 3: {{ $product->feature3 }}</p>
                        <p>Feature 4: {{ $product->feature4 }}</p>
                        <p>Feature 5: {{ $product->feature5 }}</p>
                        <p>Feature 6: {{ $product->feature6 }}</p>
                        <p>Price: {{ $product->price }}$</p>
                        <p>Included: {{ $product->included }}</p>
                        <p>Quantity: {{ $product->quantity }}</p>
                    </div>
                    <a class="btn btn-outline-secondary btn-sm"
                        href="/cms/products/modify.php?id={{ $product->id }}">Modifier</a>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>