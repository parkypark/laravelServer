<?php

namespace App\Http\Controllers\hurryupApp;

use App\Http\Controllers\HurryupController; 
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\hurryupApp\Restaurant;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends HurryupController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $rests = Restaurant::all();
        return Response::prettyjson($rests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $this->validate($request);
 
        $rest = new Restaurant;
        $rest->name             = $validatedData['name'];
        $rest->description      = $validatedData['description'];
        $rest->address_id       = $validatedData['address_id'];
        $rest->image_id         = $validatedData['image_id'];
        $rest->save();
         
        
        return Response::prettyjson([$validatedData]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // get the Restaurant
        $rest = Restaurant::find($id);
        if($rest)
            return Response::prettyjson($rest);
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
        $validatedData = $this->validate($request);
 
        $rest = Restaurant::find($id);
        if(!$rest)
            return Response::prettyjson(Response::errorStud(true, 'Not Exists in DB'));

        $rest->name             = $validatedData['name'];
        $rest->description      = $validatedData['description'];
        $rest->address_id       = $validatedData['address_id'];
        $rest->image_id         = $validatedData['image_id'];
        $rest->save();
    
        return Response::prettyjson($rest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get the Restaurant
        $rest = Restaurant::findOrFail($id);
        $rest->delete();

        return Response::prettyjson($rest);
    }

    protected function validate(Request $request)
    {
        $validatedData = $request->validateWithBag('post', [
            'name' => ['required','nullable','max:55'],
            'description' => ['nullable', 'max:255'],
            'address_id' => ['required', 'integer', 'exists:address,id'],
            'image_id' => ['required', 'integer', 'exists:thumbnail,id'],
        ]);

        return $validatedData;
    }
}
