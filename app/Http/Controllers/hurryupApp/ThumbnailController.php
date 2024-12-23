<?php

namespace App\Http\Controllers\hurryupApp;

use Illuminate\Http\Request;
use App\Models\hurryupApp\Thumbnail;
use App\Http\Controllers\HurryupController;  
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ThumbnailController extends HurryupController
{
      
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         
        $url = Thumbnail::find($id);

        return Response::prettyjson($url);
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

        $thumbnail = Thumbnail::find($id);
        if (!$thumbnail) {
            return Response::prettyjson(Response::errorStud(true, 'Thumbnail Class not found'));
        }

        $thumbnail->imgUrl = $validatedData['imgUrl'];
        $thumbnail->save();
        return Response::prettyjson($thumbnail); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get the Restaurant
        $thumbnail = Thumbnail::findOrFail($id);
        $thumbnail->delete();

        return Response::prettyjson($thumbnail);
    }

    protected function validate(Request $request)
    {
        $validatedData = $request->validateWithBag('post', [
            'imgUrl' => ['required','nullable']
        ]);

        return $validatedData;
    }
}
