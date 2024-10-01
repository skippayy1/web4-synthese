<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid">
        @if (isset($_GET["error"]))
            <p>Informations de connexion incorrectes</p>
        @endif
        <form action="/cms/login_submit" method="post">
            @csrf
            <div class="form-floating mt-2 w-50">
                <input type="text" class="form-control" name="name" placeholder="Nom d'utilisateur">
                <label for="name">Nom d'utilisateur</label>
            </div>
            <div class="form-floating mt-2 w-50">
                <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                <label for="password">Mot de passe</label>
            </div>
            <button class="btn btn-success mt-2 w-50">Connexion</button>
        </form>
    </div>
</body>
</html>