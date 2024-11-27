<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\Slider;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index()
    {
        $recent_properties = Property::orderBy('price', 'desc')->orderBy('type', 'asc')->get();
        $sliders = Slider::take(3)->get();
        return view('welcome', compact('recent_properties','sliders'));
    }

    public function search(Request $request)
    {
        $properties = Property::where('status',$request->status)->paginate(10);
        $recent_properties = Property::orderBy('created_at', 'DESC')->take(5)->get();
        return view('search',compact('properties','recent_properties'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function property()
    {

        $properties = Property::paginate(10);
        $recent_properties = Property::orderBy('created_at', 'DESC')->take(5)->get();
        return view('property', compact('properties', 'recent_properties'));
    }

    public function propertyDetail($id)
    {

        $recent_properties = Property::orderBy('created_at', 'DESC')->take(3)->get();
        $property = Property::find($id);
        return view('propertyDetails',compact('property','recent_properties'));
    }

    function myProperty(){
        $properties = Property::where('user_id',Auth::id())->get();
        return view('UserProperty.user_property',compact('properties'));
    }

    public function editMyProperty($id){
        $property = Property::findOrFail($id);
        return view('UserProperty.edit',compact('property'));

    }

    public function updateMyProperty(Request $request,$id){
        $property = Property::findOrFail($id);
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
            toastr()->success('Property Update Successfully!!');
            $property->update();
            return redirect()->back();

    }

    public function filterProperty(Request $request)
    {

        $priceFilter = $request->input('price');


        $explode = explode('-',$priceFilter);

        $minPrice = $explode[0];
        $maxPrice = $explode[1];
        $priceBetween = Property::where('price', '>=', $minPrice)
        ->where('price', '<=', $maxPrice)
        ->get();
        Session::put('price',$priceFilter);
        $getSelectedValue = Session::get('price');
        return view('filter_property',compact('priceBetween','getSelectedValue'));
    }

    public function bookProperty($id){
            $propertyID = $id;
        return view('Booking.Booking',compact('propertyID'));
    }
}
