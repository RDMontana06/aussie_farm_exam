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


    public function update(Request $request, Kangaroo $kangaroo)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:kangaroos,name,' . $kangaroo->id,
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'gender' => 'required',
            'birthday' => 'required|date',
            // Add validation rules for optional fields if necessary
            'nickname' => 'nullable|string',
            'color' => 'nullable|string',
            'friendliness' => 'nullable|string',
        ]);

        $kangaroo->update($validatedData);

        return redirect()->route('kangaroos.index')->with('success', 'Kangaroo updated successfully.');
    }

}