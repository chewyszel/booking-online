<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    // LIST DATA
    public function index()
    {
        $fields = Field::all();
        return view('fields.index', compact('fields'));
    }

    // FORM CREATE
    public function create()
    {
        return view('fields.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'harga' => 'required|numeric',
        ]);

        Field::create([
            'nama_lapangan' => $request->nama_lapangan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('fields.index');
    }

    // DETAIL DATA (SHOW)
    public function show(Field $field)
    {
        return view('fields.show', compact('field'));
    }

    // FORM EDIT
    public function edit(Field $field)
    {
        return view('fields.edit', compact('field'));
    }

    // UPDATE DATA
    public function update(Request $request, Field $field)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'harga' => 'required|numeric',
        ]);

        $field->update([
            'nama_lapangan' => $request->nama_lapangan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('fields.index');
    }

    // DELETE DATA
    public function destroy(Field $field)
    {
        $field->delete();

        return redirect()->route('fields.index');
    }

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    */

    // GET ALL FIELD
    public function apiIndex()
    {
        $fields = Field::all();

        return response()->json([
            'success' => true,
            'data' => $fields
        ]);
    }

    // GET DETAIL FIELD
    public function apiShow($id)
    {
        $field = Field::find($id);

        if (!$field) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $field
        ]);
    }
}