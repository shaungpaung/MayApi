<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pet = Pet::paginate(10);
        return $pet;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required',
            'status' =>  ['required', Rule::in(config('enums.status'))],
            'pawrent' => 'required',
            'breed' =>  ['required', Rule::in(config('enums.breed'))],
            'gender' =>  ['required', Rule::in(config('enums.gender'))],
            'contact' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'city' =>  ['required', Rule::in(config('enums.city'))],
            'township' =>  ['required', Rule::in(config('enums.township'))],
        ]);
        $pet = Pet::create($validate);
        return response()->json($pet);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pet = Pet::find($id);
        return response()->json($pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Pet ' . $id . ' Not found'], 404);
        }
        $validate = $request->validate([
            'name' => 'required',
            'status' =>  ['required', Rule::in(config('enums.status'))],
            'pawrent' => 'required',
            'breed' =>  ['required', Rule::in(config('enums.breed'))],
            'gender' =>  ['required', Rule::in(config('enums.gender'))],
            'contact' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'city' =>  ['required', Rule::in(config('enums.city'))],
            'township' =>  ['required', Rule::in(config('enums.township'))],
        ]);
        $pet->update($validate);
        return response()->json(['message' => 'Pet updated successfully', 'data' => $pet]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pet = Pet::destroy($id);
        $result = "Delete Success!";
        return response()->json($result);
    }
}
