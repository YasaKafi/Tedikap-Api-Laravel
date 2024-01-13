<?php

namespace App\Http\Controllers;

use App\Models\MilkDrink;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;

class MilkDrinkController extends Controller
{

    use ResponseController;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->showResponse(MilkDrink::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $milk = MilkDrink::create(
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

        return $milk;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drink = MilkDrink::find($id);

        return $drink;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $milk = MilkDrink::find($id);
        $milk->update(
            $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required',
                'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'rating' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'image_url' => 'required',
                'category'=> 'required',



            ])
        );

        return $milk;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $milk = MilkDrink::find($id);
        $milk->delete();
        return response(status:204);
    }
}
