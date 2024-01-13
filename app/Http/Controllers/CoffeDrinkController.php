<?php

namespace App\Http\Controllers;

use App\Models\CoffeDrink;
use App\Http\Controllers\ResponseController;
use Illuminate\Http\Request;

class CoffeDrinkController extends Controller
{
    use ResponseController;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->showResponse(CoffeDrink::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coffee = CoffeDrink::create(
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

        return $coffee;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drink = CoffeDrink::find($id);

        return $drink;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $coffee = CoffeDrink::find($id);
        $coffee->update(
            $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required',
                'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'rating' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'image_url' => 'required',
                'category'=> 'required',



            ])
        );

        return $coffee;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coffee = CoffeDrink::find($id);
        $coffee->delete();
        return response(status:204);
    }
}
