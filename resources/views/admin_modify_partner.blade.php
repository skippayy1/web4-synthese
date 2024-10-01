<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Modifier un partenaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
        <main>
        <a href="/cms/partners" class="btn btn-secondary">Retour</a>
            <form action="/cms/partner/modify_submit" method="post" enctype="multipart/form-data">
                @csrf
            
                <input type="hidden" name="id" value="{{ $partner->id }}">
                <div class="form-floating w-50">
                    <input type="text" name="name" class="form-control mt-2" value="{{ $partner->name }}">
                    <label for="name">Nom</label>
                </div>
                <div class="form-floating w-50">
                    <input type="text" name="link" class="form-control mt-2" value="{{ $partner->link }}">
                    <label for="link">Lien</label>
                </div>
                <div>
                    <img src="{{ $partner->logo }}" alt="" style="height: 200px;" class="mt-2">
                </div>
                <div class="form-floating mt-2 w-50">
                    <input type="file" name="image" class="form-control" placeholder="Logo">
                    <label for="image">Logo</label>
                </div>
                <button class="btn btn-lg btn-primary mt-2 w-50">Modifier</input>
            </form>
        </main>
    </div>
</body>
</html>