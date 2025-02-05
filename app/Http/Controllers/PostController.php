<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController  extends Controller
{
    public function index()
    {
        $posts = Post::with('media')->latest()->get(); // Obtiene los posts con sus archivos

        return view('index', compact('posts'));
    }
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'file' => 'required|file|max:2048',
        ]);

        try {
            // Crear el post y asignar el usuario autenticado
            $post = Post::create([
                'title' => $request->title,
                'content' => $request->content
            ]);

            // Guardar el archivo en la colección 'images'
            if ($request->hasFile('file')) {
                $post->addMediaFromRequest('file')->toMediaCollection('images');
            }

            return back()->with('success', 'Post creado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el post: ' . $e->getMessage());
        }
    }
}
