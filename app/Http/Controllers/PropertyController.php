<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.property',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function user()
    {
        return view('addProperty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToImage = $filename . '_' . time() . '.' . $extension;

            //Upload Image
            $path = $request->file('image')->move('img/', $fileNameToImage);
        }

        DB::beginTransaction();
        try {
            $property = new Property();
            $property->title = $request->title;
            $property->description = $request->description;
            $property->status = $request->status;
            $property->type = $request->type;
            $property->rooms = $request->rooms;
            $property->price = $request->price;
            $property->area = $request->area;
            $property->longitude = $request->longitude;
            $property->latitude = $request->latitude;
            $property->image = $fileNameToImage;
            $property->user_id = auth()->user()->id;
            $property->save();
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error('Error While Adding Property');
            return redirect()->back();
        }
        
        DB::commit();
        toastr()->success('Property Added Successfully!!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }

    //ajax
    public function GoogleMap(){
        
    }
}
