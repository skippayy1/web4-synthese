<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
<nav class="m-2 pl-2 navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('admin.home') }}">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.partners') }}">Partners</a>
                </li>
            </ul>
            <form action="{{route('admin.logout')}}" method="POST" class="ms-auto my-2 my-lg-0">
            @csrf
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Admin Home</h1>
                <!-- QUANTITY SECTION -->
                <div class="row bg-light text-white p-3 shadow rounded">
                    @foreach ($products as $product)
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <p class="font-weight-bold mb-0" style="color:{{$product->quantity <= 10 ? 'red' : '#222222'}};"> {{$product->title }} Quantity: {{ $product->quantity }}</p>
                    </div>
                    @endforeach
                    <p class="text-center mt-3" style="color: #222222;">
                        <?php
$productsAreStocked = true;
foreach ($products as $product) {
    if ($product->quantity <= 10) {
        $productsAreStocked = false;
    }
}
if ($productsAreStocked) {
    echo 'All products are sufficiently stocked';
} else {
    echo 'Some products are not sufficiently stocked';
}
                        ?>
                    </p>
                </div>
                <!--  REVIEW SECTION  -->
                <div class="row">
                    <div class="col-md-6">
                        <div style="height: 500px; overflow-y: scroll;" class="mt-3 rounded position-relative h-5 bg-secondary p-2 scrollable-section">
                            <h2 style="color: white;">Reviews</h2>
                            @foreach ($reviews->take(10) as $review)
                            <div class="bg-body-tertiary rounded container p-3 mb-3 shadow text-dark position-relative">
                                <div class="p-2">
                                    <h2 class="fs-3">
                                        Title: {{$review->title}} 
                                    </h2>
                                    <p>
                                        Username: {{$review->user->name}}
                                    </p>
                                    <p class="fs-5">
                                        Product:
                                        @if (isset($review->product->title))
                                        {{$review->product->title}}
                                        @else
                                        Product not found
                                        @endif
                                    </p>
                                    <p class="fs-5">
                                        Review: {{ $review->review }}
                                    </p>
                                    <p class="fs-6">
                                        Uploaded at: {{$review->uploaded_at}}
                                    </p>
                                    <p style="color: darkgoldenrod;" class="position-absolute top-0 end-0 m-3">
                                        @for ($j = 0; $j < $review->rating; $j++) &#9733; @endfor
                                    </p>
                                    <div>
                                        <a href="{{ route('reviews.delete.submit', ['id' => $review->id]) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- NEWS SECTION -->
                    <div class="col-md-6">
                        <div style="height: 500px; overflow-y: scroll;" class="mt-3 rounded position-relative h-5 bg-secondary p-2 scrollable-section">
                            <h2 style="color: white;">News</h2>
                            @foreach ($news->take(10) as $new)
                            <div class="bg-body-tertiary rounded container p-3 mb-3 shadow text-dark position-relative">
                                <div class="p-2">
                                    <h2 class="fs-3">
                                    {{$new->title}}
                                    </h2>
                                    <p class="fs-5">
                                        {{$new->description}}
                                    </p>
                                    <p class="fs-6">
                                        Uploaded at: {{$new->date}}
                                    </p>
                                    <div>
                                    <a href="/cms/news/delete_submit.php?id={{$new->id}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- PREORDERS SECTION -->
            <div class="row">
                <div class="col-md-6">
                    <div style="height: 500px; overflow-y: scroll;" class="mt-3 rounded position-relative h-5 bg-secondary p-2 scrollable-section">
                        <h2 style="color: white;">Preorders</h2>
                        @foreach ($orders->take(10) as $order)
                        <div class="bg-body-tertiary rounded container p-3 mb-3 shadow text-dark position-relative">
                            <div class="p-2">
                                <h2 class="fs-3">
                                    {{$order->user->name}}
                                </h2>
                                <p class="fs-5">
                                    {{ $order->date }}
                                </p>
                                <p class="fs-6">
                                    Ship to: {{ $order->address }}
                                </p>
                                <div class="products">
                                    <p class="fs-6">
                                        Product 1: {{ $order->quantity_product1 }}
                                        </p>
                                    <p class="fs-6">
                                        Product 2: {{ $order->quantity_product2 }}
                                        </p>
                                    <p class="fs-6">
                                        Product 3: {{ $order->quantity_product3 }}
                                        </p>
                                </div>
                                <div>
                                    <a href="{{ route('admin.orders.delete', ['id' => $order->user->id]) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- STATS SECTION -->
                <div class="col-md-6">
                    <div style="height: 500px; overflow-y: scroll;" class="mt-3 rounded position-relative h-5 bg-secondary p-2 scrollable-section">
                        <h2 style="color: white;">Stats</h2>
                        <div class="bg-body-tertiary rounded container p-3 mb-3 shadow text-dark position-relative">
                            <div class="p-2">
                                @if($pages != null)
                                <h3>Top 10 pages by views</h3>
                                <div>
                                    {{ $viewsChart->container() }}
                                </div>
                                @else
                                <p>No data to display</p>
                                @endif
                            </div>
                        </div>
                        <div class="bg-body-tertiary rounded container p-3 mb-3 shadow text-dark position-relative">
                            <h2>All pages</h2>
                            @foreach ($pages as $page)
                            <div class="p-2">
                                <p class="fs-5">
                                    Page: {{ $page->title }}
                                </p>
                                <p class="fs-6">
                                    Views: {{ $page->views }}
                                </p>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                @if($pages != null)
                {{ $viewsChart->script() }}
            @endif
        </body>

</html>