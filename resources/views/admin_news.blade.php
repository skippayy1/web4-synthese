<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Nouvelles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            </ul>
            <form action="{{route('admin.logout')}}" method="POST" class="ms-auto my-2 my-lg-0">
            @csrf
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
        </div>
    </nav>
<div class="container news">
                <h2>Nouvelles</h2>
                <a href="/cms/news/add" class="btn btn-primary">Ajouter une nouvelle</a>

                <div class="list">
                    @if (empty($news))
                    <h3>Aucunes nouvelles</h3>
                    @endif
                    @foreach ($news as $new)
                    <div class="item">
                        <h3>{{ $new->title }}</h3>
                        <p>{{ $new->date }}</p>
                        <div class="description">
                            @if ($new->image_url != null)
                                <img src="{{ asset($new->image_url) }}" alt="">
                            @endif
                            <p>{{ $new->description }}</p>
                        </div>
                        <a class="btn btn-outline-secondary btn-sm" href="/cms/news/modify.php?id={{ $new->id }}">Modifier</a>
                        <a class="btn btn-outline-secondary btn-sm" href="/cms/news/delete_submit.php?id={{ $new->id }}">Supprimer</a>
                    </div>
                    @endforeach
                </div>
            </div>
</body>
</html>