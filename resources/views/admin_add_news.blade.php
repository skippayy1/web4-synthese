<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ajouter une nouvelle</title>
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
<div class="container-fluid">
        <main>
            <a href="/cms/news" class="btn btn-secondary">Retour</a>
            <form action="/cms/news/add_submit" method="post" enctype="multipart/form-data">
                @csrf
            
                <div class="form-floating w-50">
                    <input type="text" name="title" class="form-control mt-2" placeholder="Titre">
                    <label for="title">Titre</label>
                </div>
                <div class="form-floating mt-2 w-50">
                    <textarea name="description" class="form-control mt-2" placeholder="Description"></textarea>
                    <label for="description">Description</label>
                </div>
                <div class="form-floating mt-2 w-50">
                    <input type="date" name="date" class="form-control" required>
                    <label for="date">Date</label>
                </div>
                <div class="form-floating mt-2 w-50">
                    <input type="file" name="image" class="form-control" placeholder="Image (optionel)">
                    <label for="image">Image (optionel)</label>
                </div>
                <button class="btn btn-lg btn-primary mt-2 w-50">Ajouter</input>
            </form>
        </main>
    </div>
</body>
</html>