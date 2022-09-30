<?php

namespace App\Http\Controllers;

use App\DesignationList;
use Illuminate\Http\Request;

class DesignationListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = DesignationList::pluck('designation')->toArray();

        return $industries;
    }
    
    public function getTrackerDesignation(Request $request)
    {
        $data = DesignationList::select('id', 'designation','employer_id')->whereNotNull('designation')->where('designation','!=','')
        ->orderBy('designation','asc')
        ->get();

        return response()->json(['data' =>$data]);
    }
}
