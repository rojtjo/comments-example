<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nested comments example</title>
</head>
<body>
    <h1>{{ $article->name }}</h1>
    @include('comments', ['comments' => $article->comments])
</body>
</html>
