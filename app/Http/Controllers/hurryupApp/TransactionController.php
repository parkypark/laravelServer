<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hurryupApp\Transaction;
use App\Http\Controllers\HurryupController;  
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class TransactionController extends HurryupController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $transaction = Transaction::all();
        return Response::prettyjson($transaction);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $this->validate($request);
 
        $transaction->active_food_id        =   $validatedData['active_food_id'];
        $transaction->phone_number    =   $validatedData['phone_number'];
        $transaction->status          =   $validatedData['status'];
        $transaction->save(); 
         
        return Response::prettyjson([$transaction]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get the Transaction
        $transaction = Transaction::find($id);
        if($transaction)
            return Response::prettyjson($transaction);
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

        $transaction = Transaction::find($id);
        if (!$transaction) {
            return Response::prettyjson(['error' => 'phone not found'], 404);
        }

        $transaction->active_food_id    =   $validatedData['active_food_id'];
        $transaction->phone_number      =   $validatedData['phone_number'];
        $transaction->status            =   $validatedData['status'];
        $transaction->save(); 

        return Response::prettyjson(['message' => 'phone updated successfully', 'Transaction' => $transaction], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // get the Address
         $transaction = Transaction::findOrFail($id);
         $transaction->delete();
 
         return Response::prettyjson($transaction);
    }

    protected function validate(Request $request)
    {

        $validatedData = $request->validate([
            'active_food_id'              => 'required',
            'phone_number'          => 'required|regex:/(01)[0-9]{9}/',
            'status'                => 'required|string',  
        ], [
            'active_food_id.required'     => 'Active Food Id is required.',
            'phone_number.required' => 'PhoneList is required.',
            'status.required'       => 'Status is required.',
        ]);
 

        return $validatedData;
    } 
}
 


