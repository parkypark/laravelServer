<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\hurryupApp\Food;
use App\Http\Controllers\HurryupController;  
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class FoodController extends HurryupController
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $food = Food::all();
        return Response::prettyjson($food);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $this->validate($request);
 
        $food->restaurantID =   $validatedData['restaurantID'];
        $food->name         =   $validatedData['name'];
        $food->description  =   $validatedData['description'];
        $food->ingredients  =   $request->input('ingredients');
        $food->price        =   $validatedData['price'];
        $food->enabled      =   $request->input('enabled');
        $food->save(); 
         

        return Response::prettyjson([$food]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get the Food
        $food = Food::find($id);
        if($food)
            return Response::prettyjson($food);
        return Response::prettyjson(Response::errorStud(true, 'Not Exists in DB'));
        
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
        $validatedData = $this->validate($request);

        $food = Food::find($id);
        if (!$address) {
            return Response::prettyjson(['error' => 'food not found'], 404);
        }

        $food->restaurantID =   $validatedData['restaurantID'];
        $food->name         =   $validatedData['name'];
        $food->description  =   $validatedData['description'];
        $food->ingredients  =   $request->input('ingredients');
        $food->price        =   $validatedData['price'];
        $food->enabled      =   $request->input('enabled');
        $food->save();

        return Response::prettyjson(['message' => 'food updated successfully', 'Food' => $food], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // get the Address
         $food = Food::findOrFail($id);
         $food->delete();
 
         return Response::prettyjson($food);
    }

    protected function validate(Request $request)
    {

        $validatedData = $request->validate([
            'restaurantID'  => 'exists:App\Models\hurryupApp\Restaurant,id',
            'name'          => 'required|string|max:100',
            'description'   => 'required|string|max:255', 
            'price'         => 'required',
        ], [
            'restaurantID.exists'   => 'Restaurant Id does not exists',
            'name.required'         => 'Food Name is required.',
            'description.required'  => 'Description is required.',
            'price.required'        => 'Price is required.',
        ]);
 

        return $validatedData;
    }
}
