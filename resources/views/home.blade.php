<!DOCTYPE html>
<html>

<head>
    <title>Movies by Genre</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            color: #007bff;
        }

        h2 {
            color: #6c757d;
        }

        .list-group-item {
            background-color: #dee2e6;
            border-color: #dee2e6;
        }

        .list-group-item a {
            color: #495057;
            text-decoration: none;
        }

        .list-group-item a:hover {
            color: #007bff;
        }

        .container {
            margin-top: 20px;
        }

        header,
        footer {
            background-color: #dee2e6;
            color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="color">
    <header class="header py-3 shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <h2 class="h3 mb-0">Peliculas</h1>
                    <button type="button" class="btn btn-primary">
                    <a href="{{ route('categories.index') }}" style="color: white;">Categorias</a>
                </button>
                </div>
            </div>
        </div>
    </header>
    <div class="container color">
        <h2 class="mt-5">Selecciona alguna Categoria</h2>
        <ul class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item">
                <a href="{{ url('/movies/genre/' . $category->name) }}">{{ $category->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <footer class="footer py-5 shadow-sm mt-5">
        <div class="container">
            <div class="text-center mt-4">
                <p></p>
            </div>
        </div>
    </footer>
</body>

</html>