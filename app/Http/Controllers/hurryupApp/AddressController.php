<?php

namespace App\Http\Controllers\hurryupApp;

use Illuminate\Http\Request;
use App\Models\hurryupApp\Address;
use App\Http\Controllers\HurryupController;  
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;


class AddressController extends HurryupController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $addresses = Address::all();
        return Response::prettyjson($addresses);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $this->validate($request);
 
        $address->Address1  =   $validatedData['Address1'];
        $address->Address2  =   $request->input('Address2');
        $address->City      =   $validatedData['City'];
        $address->Province  =   $validatedData['Province'];
        $address->Postal    =   $validatedData['Postal'];
        $address->Country   =   $request->input('Country');
        $address->save(); 
        
        return Response::prettyjson([$address]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get the Address
        $address = Address::find($id);
        if($address)
            return Response::prettyjson($address);
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

        $address = Address::find($id);
        if (!$address) {
            return Response::prettyjson(['error' => 'address not found'], 404);
        }

        $address->Address1  =   $validatedData['Address1'];
        $address->Address2  =   $request->input('Address2');
        $address->City      =   $validatedData['City'];
        $address->Province  =   $validatedData['Province'];
        $address->Postal    =   $validatedData['Postal'];
        $address->Country   =   $request->input('Country');
        $address->save();

        return Response::prettyjson(['message' => 'Address updated successfully', 'Address' => $address], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // get the Address
         $address = Address::findOrFail($id);
         $address->delete();
 
         return Response::prettyjson($address);
    }

    protected function validate(Request $request)
    {
        $validatedData = $request->validate([
            'address1' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => [
                'required',
                'regex:/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/',
            ],
        ], [
            'address1.required' => 'Address is required.',
            'city.required' => 'City is required.',
            'province.required' => 'Province is required.',
            'postal_code.required' => 'Postal code is required.',
            'postal_code.regex' => 'Please enter a valid postal code.',
        ]);
 

        return $validatedData;
    }
}
