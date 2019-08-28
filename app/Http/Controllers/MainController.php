<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class MainController extends Controller
{
    public function storeItem(Request $request){
       Data::create([
        'name' => $request->name,
        'age' => $request->age,
        'profession' => $request->profession
       ]);

    //    return view()
    }
}
