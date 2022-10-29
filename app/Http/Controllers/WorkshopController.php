<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResumeBuildingWorkshop;
use App\LinkedInWorkshop;

class WorkshopController extends Controller
{
    public function viewResumeBuilding(){
        // return view('');
    }

    public function storeResumeBuilding(Request $request){
        // return response->json($request->all());
        $user = ResumeBuildingWorkshop::create($request->all());
        return response()->json([
            'message' => "Registered successfully!"
        ], 200);
        
    }

    public function viewLinkedIn(){
        // return view('');
    }

    public function storeLinkedIn(Request $request){
        // return response->json($request->all());
        $user = LinkedInWorkshop::create($request->all());
        return response()->json([
            'message' => "Registered successfully!"
        ], 200);
        
    }
    
}
