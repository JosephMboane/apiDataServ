<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro; // Make sure to import the Registro model

class RegistroController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registros|max:255',
            'componey' => 'required|string|max:255',
            'charge' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'status' => 'required|boolean',
        ]);

        // Create a new record using the validated data
        $registro = Registro::create($validatedData);

        return response()->json([
            'message' => 'Registro criado com sucesso',
            'registro' => $registro,
        ], 201);
    }
    public function index()
    {
        $datas = Registro::all();

        return $datas;
    }
}
