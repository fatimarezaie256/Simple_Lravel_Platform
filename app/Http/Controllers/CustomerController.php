<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Events\createUserEvent;
class CustomerController extends Controller
{
    //
    public function index(){
        return view('customer.home');
    }
    public function create(Request $request){
    $request->validate([
        "name"=>"required|min:3|max:30",
        "lastName"=>"required|min:3|max:30",
        "email"=>"required|min:7",
        "image"=>"nullable|mimes:png,jpg,jpeg,gif"

    ]);
    $imagePath=null;
    if($request->hasFile("img_url")){
        $imagePath = $request->file("img_url")->store("images","public");
    }    
    $customer = new Customer();
    $customer->name = $request->name;
    $customer->lastName = $request->lastName;
    $customer->email = $request->email;
    $customer->img_url = $imagePath;
    $customer->save();
    event(new createUserEvent($customer));}
}
