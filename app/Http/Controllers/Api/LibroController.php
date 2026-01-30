<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        return response()->json(
            Libro::with('autor')->get(),
            200
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'anio' => 'required|integer',
            'precio' => 'required|numeric|min:0',
        ]);

        $libro = Libro::create($request->all());

        return response()->json([
            'message' => 'Libro creado correctamente',
            'libro' => $libro
        ], 201);
    }

    public function show($id)
    {
        $libro = Libro::with('autor')->find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        return response()->json($libro, 200);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $libro->update($request->all());

        return response()->json([
            'message' => 'Libro actualizado',
            'libro' => $libro
        ], 200);
    }

    public function destroy($id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $libro->delete();

        return response()->json(['message' => 'Libro eliminado'], 200);
    }
}
