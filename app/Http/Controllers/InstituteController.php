<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index($name)
    {
        $data = DB::table('institute')->select('name')->where('name', 'like', "%$name%")->get()->take(10);
        return response()->json(['data' =>  $data], 200);
    }
}
