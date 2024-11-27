<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   public function index(){
    $booking = Booking::all();
    return view('admin.Booking.booking',compact('booking'));
   }

   public function bookPropertyStore(Request $request,$id){
    $property = Property::findOrFail($id);
    $booking = new Booking();
    $booking->property_id = $request->property_id;
    $booking->user_id = Auth::id();
    $booking->contact = $request->contact;
    $booking->address = $request->address;
    $booking->save();
    toastr()->success('Scan QR code ');
    return redirect()->route('scan.qr',$property);

   }

   public function scanQr($id){
    $property = Property::findOrFail($id);

    return view('scan_qr.scan_qr',compact('property'));
   }

   public function myBooking(){
    $booking = Booking::where('user_id',Auth::id())->where('isAprove',1)->get();
    return view('UserProperty.my_booking',compact('booking'));
   }

   public function aprove($id){
    $aprove = Booking::findOrFail($id);
    $aprove->isAprove = 1;
    $aprove->save();
    return redirect()->back()->with('success','Booking Approve');
   }
   public function reject($id){
    $aprove = Booking::findOrFail($id);
    $aprove->isAprove = 0;
    $aprove->save();
    toastr()->success('Booking Rejected');
    return redirect()->back()->with('success','Booking Rejecter');
   }



}
