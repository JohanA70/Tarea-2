<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function showHome()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function showMoviesByGenre($genre)
    {
        $category = Category::where('name', $genre)->first();
        if ($category) {
            $movies = $category->movies;
            return view('movies', compact('genre', 'movies'));
        } else {
            return view('error');
        }
    }

    public function editar($id)
    {
        $movie = Movie::findOrFail($id);
        $categories = Category::all();
        return view('editar', compact('movie', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2099',
            'studio' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->studio = $request->input('studio');
        $movie->category_id = $request->input('category_id');
        $movie->save();

        return redirect()->route('movies.genre', ['genre' => $movie->category->name])
                         ->with('success', 'Película actualizada exitosamente.');
    }

    public function eliminar($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->back()->with('success', 'Película eliminada exitosamente.');
    }
}
