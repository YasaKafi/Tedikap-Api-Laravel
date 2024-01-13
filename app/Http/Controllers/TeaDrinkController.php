<?php

namespace App\Http\Controllers;

use App\Models\TeaDrink;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;

class TeaDrinkController extends Controller
{
    use ResponseController;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->showResponse(TeaDrink::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tea = TeaDrink::create(
            [
                ...$request->validate([
                    'name' => 'required|string|max:50',
                    'description' => 'required',
                    'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                    'rating' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                    'image_url' => 'required',
                    'category'=> 'required',



                ])
            ]
        );

        return $tea;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drink = TeaDrink::find($id);

        return $drink;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tea = TeaDrink::find($id);
        $tea->update(
            $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required',
                'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'rating' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'image_url' => 'required',
                'category'=> 'required',



            ])
        );

        return $tea;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tea = TeaDrink::find($id);
        $tea->delete();
        return response(status:204);
    }
}
