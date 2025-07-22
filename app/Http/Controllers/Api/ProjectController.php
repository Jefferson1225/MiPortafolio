<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Listar todos los proyectos
     */
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return response()->json($projects);
    }

    /**
     * Crear un nuevo proyecto
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|array',
            'image_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'featured' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $project = Project::create($request->all());
        return response()->json($project, 201);
    }

    /**
     * Mostrar un proyecto específico
     */
    public function show($id)
{
    $project = Project::findOrFail($id);

    return Inertia::render('ProjectShow', [ // 👈 Usa el nombre correcto del archivo Vue
        'project' => $project
    ]);
}
    

    /**
     * Actualizar proyecto
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'technologies' => 'required|array',
                'image_url' => 'nullable|url',
                'demo_url' => 'nullable|url',
                'github_url' => 'nullable|url',
                'featured' => 'boolean',
                'order' => 'integer|min:0'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(null, 204);
    }
}
