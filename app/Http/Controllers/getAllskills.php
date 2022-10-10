<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class getAllskills extends Controller
{
    public function index($key)
    {
        $data = DB::table('skills')->select('name')->where('name', 'like', "%$key%")->get()->take(10);
        return response()->json(['data' =>  $data], 200);
    }
}
