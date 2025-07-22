<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Listar todas las habilidades
     */
    public function index()
    {
        $skills = Skill::orderBy('order')->get();
        return response()->json($skills);
    }

    /**
     * crear nueva habilidad
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'level' => 'required|in:principiante,intermedio,avanzado',
                'image_url' => 'nullable|url', 
                'order' => 'integer|min:0'
            ]
        );

        $skill = Skill::create($request->all());
        return response()->json($skill, 201);
    }

    /**
     * Mostrar una habilidad específica
     */
    public function show(Skill $skill)
    {
        return response()->json($skill);
    }

    /**
     * Actualizar habilidad
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:principiante,intermedio,avanzado',
            'image_url' => 'nullable|url',
            'order' => 'integer|min:0'
        ]);

        $skill->update($request->all());
        return response()->json($skill);
    }

    /**
     * Elimiar Habilidad
     */
    public function destroy(string $id)
    {
        $skill->delete();
        return response()->json(null, 204);
    }
}
