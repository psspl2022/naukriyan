<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function index(Request $request)
    {
        $state_id = $request->state_id;

        $data = DB::table('cities')
            ->where('state_id', $state_id)
            ->get();

        return response()->json(['data' => $data], 200);
    }
    public function getCityByState($id){
        $data = DB::table('cities')
            ->where('state_id', $id)
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function show($id)
    {
        $data = DB::table('states')
            ->leftjoin('advertisements', 'advertisements.id', '=', 'jobs.adv_id')
            ->leftjoin('designations', 'designations.id', '=', 'jobs.designation_id')
            ->select('jobs.adv_id', 'jobs.designation_id', 'designations.id', 'designations.designation')
            ->where('jobs.adv_id', $id)
            ->distinct()
            ->get();

        return response()->json(['data' => $data], 200);
    }

}
