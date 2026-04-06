<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['content'] }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Voltar para Lista</a>
        <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning">Editar</a>
    </div>
</body>
</html>