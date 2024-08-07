<!DOCTYPE html>
<html>
<head>
    <title>Editar Película</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #6c757d;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Editar Película</h1>
        <a href="{{ url('/movies/genre/' . $movie->category->name) }}" class="btn btn-danger">Volver</a>

        <form action="{{ url('/movies/update/' . $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control color" id="title" name="title" value="{{ $movie->title }}" required>
            </div>
            <div class="form-group">
                <label for="year">Año</label>
                <input type="number" class="form-control color" id="year" name="year" value="{{ $movie->year }}" required>
            </div>
            <div class="form-group">
                <label for="studio">Estudio</label>
                <input type="text" class="form-control color" id="studio" name="studio" value="{{ $movie->studio }}" required>
            </div>
            <div class="form-group">
                <label for="category">Categoría</label>
                <select class="form-control color" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $movie->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>
