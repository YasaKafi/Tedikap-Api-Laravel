<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrinkRequest;
use App\Http\Requests\UpdateDrinkRequest;
use App\Http\Controllers\ResponseController;
use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    use ResponseController;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->showResponse(Drink::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drink = Drink::create(
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

        return $drink;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drink = Drink::find($id);

        return $drink;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $drink = Drink::find($id);
        $drink->update(
            $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required',
                'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'rating' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'image_url' => 'required',
                'category'=> 'required',



            ])
        );

        return $drink;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $drink = Drink::find($id);
        $drink->delete();
        return response(status:200);
    }
}
