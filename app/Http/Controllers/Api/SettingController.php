<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Listar todas las configuraciones 
     */
    public function index()
    {
        $settings = Setting::all();
        return response()->json($settings);
    }

    /**
     * Crear nueva configuracion
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings,key',
            'value' => 'required|string'
        ]);

        $setting = Setting::create($request->all());
        return response()->json($setting, 201);
    }

    /**
     * Mostrar configuracion especifica
     */
    public function show(Setting $setting)
    {
        return response()->json($setting);
    }

    /**
     * Actualizar configuracion
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,' . $setting->id,
            'value' => 'required|string'
        ]);

        $setting->update($request->all());
        return response()->json($setting);
    }

    /**
     * Eliminar configuracion
     */
    public function destroy(string $id)
    {
        $setting->delete();
        return response()->json(null, 204);
    }
}
