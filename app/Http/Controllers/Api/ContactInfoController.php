<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Listar toda la informacion de contacto
     */
    public function index()
    {
        $contacts = ContactInfo::where('is_active', true)
            ->orderBy('order')
            ->get();
        return response()->json($contacts);
    }

    /**
     * Crear nueva informacion de contacto
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'value' => 'required|string|max:255',
            'label' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $contact = ContactInfo::create($request->all());
        return response()->json($contact, 201);
    }

    /**
     * Mostrar informacion de contacto especifica
     */
    public function show(ContactoInfo $contactInfo)
    {
        return response()->json($contactInfo);
    }


    /**
     * Actualizar informacion de contacto
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'value' => 'required|string|max:255',
            'label' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $contactInfo->update($request->all());
        return response()->json($contact);
    }

    /**
     * Eliminar informacion de contacto
     */
    public function destroy(string $id)
    {
        $contactInfo->delete();
        return response()->json(null, 204);
    }
}
