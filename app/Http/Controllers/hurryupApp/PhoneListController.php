<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\hurryupApp\PhoneList;
use App\Http\Controllers\HurryupController;  
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class PhoneListController extends HurryupController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $phoneList = PhoneList::all();
        return Response::prettyjson($phoneList);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validatedData = $this->validate($request);
 
        $phoneList->group_id        =   $validatedData['group_id'];
        $phoneList->phone_number    =   $validatedData['phone_number'];
        $phoneList->status          =   $validatedData['status'];
        $phoneList->save(); 
         
        return Response::prettyjson([$phoneList]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get the PhoneList
        $phoneList = PhoneList::find($id);
        if($phoneList)
            return Response::prettyjson($phoneList);
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

        $phoneList = PhoneList::find($id);
        if (!$phoneList) {
            return Response::prettyjson(['error' => 'phone not found'], 404);
        }

        $phoneList->group_id        =   $validatedData['group_id'];
        $phoneList->phone_number    =   $validatedData['phone_number'];
        $phoneList->status          =   $validatedData['status'];
        $phoneList->save(); 

        return Response::prettyjson(['message' => 'phone updated successfully', 'PhoneList' => $phoneList], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // get the Address
         $phoneList = PhoneList::findOrFail($id);
         $phoneList->delete();
 
         return Response::prettyjson($phoneList);
    }

    protected function validate(Request $request)
    {
        $validatedData = $request->validate([
            'group_id'              => 'required',
            'phone_number'          => 'required|regex:/(01)[0-9]{9}/',
            'status'                => 'required|string|max:255',  
        ], [
            'group_id.required'     => 'Group Id is required.',
            'phone_number.required' => 'PhoneList is required.',
            'status.required'       => 'Status is required.',
        ]);
 

        return $validatedData;
    } 
}
