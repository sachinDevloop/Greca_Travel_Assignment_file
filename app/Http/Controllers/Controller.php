<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Product;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAllClient() {
    $client = Client::orderBy('id', 'ASC')->get()->toJson(JSON_PRETTY_PRINT);
    return response($client, 200);
  }

   public function getAllproduct() {
    $product = Product::orderBy('id', 'ASC')->get()->toJson(JSON_PRETTY_PRINT);
    return response($product, 200);
  }

   public function getAllbooking() {
    $booking = Booking::orderBy('id', 'ASC')->get()->toJson(JSON_PRETTY_PRINT);
    return response($booking, 200);
  }

public function getBookingstatus(){

$bookingstatus=DB::table('product')
    ->select('product.id','product.title', DB::raw('COUNT(booking.product_id) AS bookingcount'),'product.capacity AS capacity',DB::raw("(CASE WHEN COUNT(booking.product_id) >= product.capacity THEN 'Unavailable'  ELSE 'Available' END) as Available_Status"))
    ->leftjoin('booking', 'product.id', '=', 'booking.product_id')
    ->groupBy('product.id')
    ->orderBy('product.id','ASC')
    ->get()->toJson(JSON_PRETTY_PRINT);

   return response($bookingstatus, 200);

}

 public function addBooking(Request $request) {
try{
         $booking = new Booking;
    $booking->client_id = $request->client_id;
    $booking->product_id = $request->product_id;
     $booking->booked_on = $request->booked_on;
    
    $booking->save();

    return response()->json([
        "message" => "Booking record created"
    ], 201);
}
    catch (\Illuminate\Database\QueryException $e){
    $errorCode = $e->errorInfo[1];
    if($errorCode == 1062){
        return response()->json([
        "message" => "Doublicate Booking's Entry!"
    ]);
    }

    }

}


}
