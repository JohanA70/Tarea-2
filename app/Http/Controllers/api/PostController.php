<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->query('orderBy', 'title');
        $orderDirection = $request->query('orderDirection', 'asc');

        $movies = Movie::with('category')->orderBy($orderBy, $orderDirection)->get();
        return response()->json($movies, 200);
    }

    public function show($id)
    {
        $movie = Movie::with('category')->find($id);

        if (!$movie) {
            return response()->json(['error' => 'Movie not found'], 404);
        }

        return response()->json($movie, 200);
    }

    // Añadir una nueva película
    public function store(Request $request)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2099',
            'studio' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear una nueva película
        $movie = Movie::create($request->all());

        return response()->json($movie, 201);
    }

    // Modificar una película existente
    public function update(Request $request, $id)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2099',
            'studio' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Encontrar la película por ID
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['error' => 'Movie not found'], 404);
        }

        // Actualizar la película
        $movie->update($request->all());

        return response()->json($movie, 200);
    }
}
