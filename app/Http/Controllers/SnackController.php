<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;

class SnackController extends Controller
{
    use ResponseController;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->showResponse(Snack::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $snack = Snack::create(
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

        return $snack;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drink = Snack::find($id);

        return $drink;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $snack = Snack::find($id);
        $snack->update(
            $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required',
                'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'rating' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'image_url' => 'required',
                'category'=> 'required',



            ])
        );

        return $snack;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $snack = Snack::find($id);
        $snack->delete();
        return response(status:204);
    }
}
