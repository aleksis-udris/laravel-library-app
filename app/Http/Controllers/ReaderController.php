<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Reader;

class ReaderController extends Controller
{
    public function index()
    {
        return response()->json(Reader::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:readers,email',
        ]);

        $reader = Reader::create($validated);

        return response()->json($reader, 201);
    }

    public function show($id)
    {
        $reader = Reader::find($id);
        if (!$reader) {
            return response()->json(['message' => 'Reader not found'], 404);
        }
        return response()->json($reader);
    }

    public function update(Request $request, $id)
    {
        $reader = Reader::find($id);

        if (!$reader) {
            return response()->json(['message' => 'Reader not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|string|unique:readers,email,'
        ]);

        $reader->update($validated);

        return response()->json($reader);
    }

    public function destroy($id)
    {
        $reader = Reader::find($id);

        if (!$reader) {
            return response()->json(['message' => 'Reader not found'], 404);
        }

        $reader->delete();

        return response()->json(['message' => 'Reader deleted']);
    }
}
