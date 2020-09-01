<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke()
    {
        return response()->json(['name' =>'yyy']);
    }

    public function index(Request $request)
    {
       // dd($request->id);
        return response()->view('about', ['user' => []]);
    }
}
