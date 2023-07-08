<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kangaroo;

class KangarooController extends Controller
{
    public function index()
    {
        $kangaroos = Kangaroo::all();
        return view('kangaroos.index', compact('kangaroos'));
    }

    public function create()
    {
        return view('kangaroos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:kangaroos',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'gender' => 'required',
            'birthday' => 'required|date'
        ]);

        $optionalData = [
            'nickname' => $request->input('nickname'),
            'color' => $request->input('color'),
            'friendliness' => $request->input('friendliness'),
        ];

        $data = array_merge($validatedData, $optionalData);

        $kangaroo = Kangaroo::create($data);

        if ($kangaroo) {
            return response()->json([
                'success' => true,
                'message' => 'Kangaroo added successfully.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add kangaroo.'
            ]);
        }
    }

    public function edit(Kangaroo $kangaroo)
    {
        return response()->json([
            'data' => $kangaroo
        ]);
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'nickname' => 'nullable|string',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'color' => 'nullable|string',
            'friendliness' => 'nullable|in:friendly,not friendly',
            'birthday' => 'required|date',
        ]);

        // Find the kangaroo by ID
        $kangaroo = Kangaroo::findOrFail($id);

        // Update the kangaroo with the validated data
        $kangaroo->update($validatedData);

        // Return a response indicating the success of the update
        return response()->json(['message' => 'Kangaroo updated successfully']);
    }

}