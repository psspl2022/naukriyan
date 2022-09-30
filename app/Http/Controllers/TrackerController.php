<?php

namespace App\Http\Controllers;

use File;
use App\SubUser;
use App\Tracker;
use App\DesignationList;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;


class TrackerController extends Controller
{
    
    public function index(Request $request)
    {
        
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $source = $request->source;
        $location = $request->location;
        $skills = $request->skills;
        $uploadstatus = $request->uploadstatus;
        $keyword = $request->keyword;
        $subuser_id = Session::get('user')['id'];

        $data =Tracker::where('added_by',$subuser_id)->orderBy('id', 'desc');

        if (isset($source) && $source != '') {
            $data->Where('reference', $source);
        }
        
       
         if (isset($from_date) && $from_date != '') {
                $data->whereDate('created_at', '>=', $from_date);
        }
    
        if (isset($to_date) && $to_date != '') {
        $data->whereDate('created_at', '<=', $to_date);
        }

        if (isset($from_date) && isset($to_date) ) {
            $data->whereBetween('created_at',[$from_date, $to_date]);
        }

        if (isset($keyword) && $keyword !== '') {
            $data->where(function ($query) use ($keyword) {
                $query->where('current_location', 'like', "%$keyword%")
                ->orwhere('preffered_location', 'like', "%$keyword%")
                ->orWhere('key_skills', 'like', "%$keyword%")
                ->orwhere('reference', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%")
                ->orWhere('contact', $keyword)
                ->orWhere('gender', $keyword)
                ->orWhere('designation', 'like', "%$keyword%")
                ->orWhere('experience', 'like', "%$keyword%")
                ->orWhere('current_ctc', 'like', "%$keyword%")
                ->orWhere('expected_ctc', 'like', "%$keyword%");
            });
        }


        if (isset($location) && $location != '') {
            $data->Where('current_location', 'like', "%$location%")
            ->orWhere('preffered_location', 'like', "%$location%");
        }

        // if (isset($skills) && $skills != '') {
        //     $data->Where('key_skills', 'like', "%$skills%");
        // }
        if (isset($skills) && $skills != '') {
            $key =explode(',',$skills);
            $data->Where(function ($query) use($key) {
                        for ($i = 0; $i < count($key); $i++){
                           $query->orwhere('key_skills', 'like',  '%' . $key[$i] .'%');
                        }      
                   });
        }
        if(isset($uploadstatus)){

            if ($uploadstatus ==='yes') {
                $data->WhereNotNull('resume');
            }
            if ($uploadstatus ==='no') {
                $data->WhereNull('resume');
            }
        }
                

        $trackerList = $data->paginate(50);
        

        return response()->json(['data' => $trackerList],200);
    }

    public function store(Request $request)
    {
        //dd($request);
        $subuser_id = Session::get('user')['id'];
        $company_id = Session::get('user')['company_id'];
        $addedbyEmployerId =SubUser::where('id', $subuser_id)->first();
        
        $tracker = new Tracker();


        $tracker->name =$request->name;
        $tracker->email =$request->email;
        $tracker->contact =$request->contact;
        $tracker->designation =$request->designation;
        $tracker->key_skills =$request->skills;
        $tracker->experience =$request->experience;
        $tracker->current_ctc =$request->current_ctc;
        $tracker->expected_ctc =$request->expected_ctc;
        $tracker->notice_period =$request->notice_period;
        //if (!empty($project->project_file)
       if($request->hasFile('resume'))
            {
                
                $filename = time().'.'.$request->resume->getClientOriginalExtension();
                $tracker->resume =$filename;
                //unlink($path,$tracker->resume);
            }
        
        $tracker->gender =$request->gender;
        $tracker->remarks =$request->remarks;
        $tracker->current_location =$request->current_location;
        $tracker->preffered_location =$request->preffered_location;
        $tracker->reference =$request->reference;
        $tracker->company_id =$company_id;
        $tracker->employer_id =$addedbyEmployerId->created_by;
        $tracker->added_by =$subuser_id;
        

        $data = $tracker->save();
        if($data)
        {
            //resume upload
            if($request->hasFile('resume'))
            {
                //in local
                $path='public/tracker/resume/';
                //in live server
                //$path='public/tracker/resume/';
                $upload = $request->resume->move($path,$filename);
                
                //unlink($path,$tracker->resume);
            }

            //new designation add(if exist)
            if(isset($request->designation))
            {
                $designation = Str::upper($request->designation);
                $desList = DesignationList::where('designation', $designation)->first();
                $designationList= Str::upper($desList);

                if ($designationList === null || $designationList ==="") {
                    $add =new DesignationList();
                    $add->designation =$designation;
                    $add->employer_id =$addedbyEmployerId->created_by;
                    $add->added_by =$subuser_id;
                    $add->save();
                }
            }
            
            
        }
        //return response()->json(['data' => $data], 200);

    }

    public function edit($id)
    {
        $Details =Tracker::where('id', $id)->first();
        return response()->json(['data' => $Details]);
    }

    public function update(Request $request, Tracker $tracker)
    {
        //dd($request->all());
        $subuser_id = Session::get('user')['id'];
        $company_id = Session::get('user')['company_id'];
        $addedbyEmployerId =SubUser::where('id', $subuser_id)->first();

        $id =$request->id;
      
        $tracker =Tracker::find($id);
        
        $tracker->name =$request->name;
        $tracker->email =$request->email;
        $tracker->contact =$request->contact;
        $tracker->designation =$request->designation;
        $tracker->key_skills =$request->key_skills;
        $tracker->experience =$request->experience;
        $tracker->current_ctc =$request->current_ctc;
        $tracker->expected_ctc =$request->expected_ctc;
        $tracker->notice_period =$request->notice_period;
        $tracker->gender =$request->gender;
        $tracker->remarks =$request->remarks;
        $tracker->company_id = $company_id;
        $tracker->employer_id =$addedbyEmployerId->created_by;
        $tracker->added_by =$subuser_id;
        $tracker->current_location =$request->current_location;
        $tracker->preffered_location =$request->preffered_location;
        $tracker->reference =$request->reference;
        $data = $tracker->save();
        if($data)
        { 
            //new designation add
            if(isset($request->designation) && $request->designation !=='')
            {
                $designation = Str::upper($request->designation);
                $desList = DesignationList::where('designation', $designation)->first();
                $designationList= Str::upper($desList);

                if ($designationList === null || $designationList ==="") {
                    $add =new DesignationList();
                    $add->designation =$designation;
                    $add->employer_id =$addedbyEmployerId->created_by;
                    $add->added_by =$subuser_id;
                    $add->save();
                }
            }
            
            
        }
        return response()->json(['data' => $data], 200);


    }
    public function uploadResume(Request $request)
    {
        //dd($request->all());
        $id =$request->id;
        $tracker =Tracker::find($id);
        $old_res =$tracker->resume;
        if(isset($request->resume))
        {  
            $filename = time().'.'.$request->resume->getClientOriginalExtension();
            $resumeData = [
                'resume' => $filename,
            ];

            $path='public/tracker/resume/';
            if(isset($old_res))
            {
                File::delete($path.$old_res);
            }
            
            Tracker::updateOrCreate(['id' => $id],$resumeData);

            
            $upload = $request->resume->move($path,$filename);
        }

    }
    public function getUniqueSourceEmployer()
    {
        $data =Tracker::distinct()->pluck('reference');
        
        
        return response()->json(['data'=>$data]);
    }
    public function exportTrackerDataEmployer()
    {
        $subuserId= Session::get('user')['id'];
        $today = date('d-m-Y');

        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=Tracker'.$today.'.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $list = DB::table('trackers')
        ->join('sub_users','sub_users.id','=','trackers.added_by')
            ->select('trackers.*','sub_users.email as emp_email','sub_users.fname as emp_name')
            ->where('added_by', $subuserId)
            ->orderBy('id', 'desc')
            ->get(); 
            $no =0;
            
        $list = collect($list)->map(function ($x ,$no)  {
            $exp = $x->experience;
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $exp))
                {
                    $exp =str_replace('-', ' to ', $exp);
                }
            return [
                'S.No' => $no +1,
                'Name' => $x->name,
                'Email' => $x->email,
                'Contact' => $x->contact,
                'Gender' => $x->gender ? $x->gender :'Not Available',
                'Skill Sets' => $x->key_skills ? $x->key_skills :'Not Available',
                'Notice Period' => $x->notice_period ? $x->notice_period :'Not Available',
                'Designation' => $x->designation ? $x->designation :'Not Available',
                'Experience(in Yr)' => $exp ? $exp:'Not Available',
                'Expected CTC' => $x->expected_ctc ? $x->expected_ctc :'Not Available',
                'Current CTC' => $x->current_ctc ? $x->current_ctc :'Not Available',
                'Current Location' => $x->current_location ? $x->current_location :'Not Available',
                'Preffered Location' => $x->preffered_location ? $x->preffered_location :'Not Available',
                'Resume' => $x->resume ? url('/tracker/resume/' . $x->resume) : 'Not Available',
                'Source' => $x->reference ? $x->reference :'Not Available',
                'Added By' => $x->emp_email ? $x->emp_email :'Not Available',
                'Date' => $x->created_at
                // 'Resume' => $x->resume ? url('resume/' . $x->resume) : 'Not Available',
                // 'Video Resume' => $x->resume_video_link ? $x->resume_video_link : 'Not Available',
            ];
        })->toArray();

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function () use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return Response::stream($callback, 200, $headers);
    }
    public function ExportTrackerCheckedDataEmployer($id)
    {
        $today = date('d-m-Y');
        $ids = explode(',', $id);
        $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
                'Content-type'        => 'text/csv',
                'Content-Disposition' => 'attachment; filename=TrackerExport'.$today.'.csv',
                'Expires'             => '0',
                'Pragma'              => 'public'
            ];
    
            $list = DB::table('trackers')
        ->join('sub_users','sub_users.id','=','trackers.added_by')
            ->select('trackers.*','sub_users.email as emp_email','sub_users.fname as emp_name')
            ->orderBy('id', 'desc')
            ->whereIn('trackers.id', $ids)
            ->get(); 
          $no =0;  
        $list = collect($list)->map(function ($x,$no)  {
            $exp = $x->experience;
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $exp))
                {
                    $exp =str_replace('-', ' to ', $exp);
                }
            return [
                'S.No' => $no +1,
                'Name' => $x->name,
                'Email' => $x->email,
                'Contact' => $x->contact,
                'Gender' => $x->gender ? $x->gender :'Not Available',
                'Skill Sets' => $x->key_skills ? $x->key_skills :'Not Available',
                'Notice Period' => $x->notice_period ? $x->notice_period :'Not Available',
                'Designation' => $x->designation ? $x->designation :'Not Available',
                'Experience(in Yr)' => $exp ? $exp:'Not Available',
                'Expected CTC' => $x->expected_ctc ? $x->expected_ctc :'Not Available',
                'Current CTC' => $x->current_ctc ? $x->current_ctc :'Not Available',
                'Current Location' => $x->current_location ? $x->current_location :'Not Available',
                'Preffered Location' => $x->preffered_location ? $x->preffered_location :'Not Available',
                'Resume' => $x->resume ? url('/tracker/resume/' . $x->resume) : 'Not Available',
                'Source' => $x->reference ? $x->reference :'Not Available',
                'Added By' => $x->emp_email ? $x->emp_email :'Not Available',
                'Date' => $x->created_at
                // 'Resume' => $x->resume ? url('resume/' . $x->resume) : 'Not Available',
                // 'Video Resume' => $x->resume_video_link ? $x->resume_video_link : 'Not Available',
            ];
        })->toArray();
    
            # add headers for each column in the CSV download
            array_unshift($list, array_keys($list[0]));
    
            $callback = function () use ($list) {
                $FH = fopen('php://output', 'w');
                foreach ($list as $row) {
                    fputcsv($FH, $row);
                }
                fclose($FH);
            };
    
            return Response::stream($callback, 200, $headers);
    }
//for Admin List Only
    public function showAdmin(Request $request)
    {
        $keyword = $request->keyword;
        $multikeyword = $request->multikeyword;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $source = $request->source;
        $addedby = $request->added_by;
        
        $location = $request->location;
        $skills = $request->skills;
       

        $data =Tracker::Join('sub_users','sub_users.id','trackers.added_by')
        ->join('all_users','all_users.id','trackers.employer_id')
        ->join('empcompaniesdetails','empcompaniesdetails.id','all_users.company_id')
        ->select('trackers.*','sub_users.fname','sub_users.lname','sub_users.email as emp_email','empcompaniesdetails.company_name')
        ->orderBy('id','desc');

        if (isset($source) && $source != '') {
            $data->Where('trackers.reference', $source);
        }
        if (isset($addedby) && $addedby != '') {
            $data->Where('added_by', $addedby);
        }
       
         if (isset($from_date) && $from_date != '') {
                $data->whereDate('trackers.created_at', '>=', $from_date);
        }
    
        if (isset($to_date) && $to_date != '') {
        $data->whereDate('trackers.created_at', '<=', $to_date);
        }

        if (isset($location) && $location != '') {
            $data->Where('trackers.current_location', 'like', "%$location%")
            ->orWhere('trackers.preffered_location', 'like', "%$location%");
        }

        if (isset($skills) && $skills != '') {
            $data->Where('trackers.key_skills', 'like', "%$skills%");
        }
        

        if (isset($keyword) && $keyword != '') {
            $data->Where('trackers.name', 'like', "%$keyword%")
            ->orWhere('trackers.email', 'like', "%$keyword%")
            ->orWhere('trackers.contact', 'like', "%$keyword%")
            ->orWhere('trackers.current_ctc', 'like', "%$keyword%")
            ->orWhere('trackers.expected_ctc', 'like', "%$keyword%")
            ->orWhere('trackers.designation', 'like', "%$keyword%")
            ->orWhere('trackers.current_location', 'like', "%$keyword%")
            ->orWhere('trackers.preffered_location', 'like', "%$keyword%")
            ->orWhere('trackers.key_skills', 'like', "%$keyword%")
            ->orWhere('trackers.experience', 'like', "%$keyword%");
        }
        if (isset($multikeyword) && $multikeyword != '') {
            $key = explode(',',$multikeyword);
            //type1
            $data->whereIn('trackers.name',$key)
            ->orwhereIn('trackers.email', $key)
            ->orwhereIn('trackers.contact', $key)
            ->orwhereIn('trackers.current_ctc', $key)
            ->orwhereIn('trackers.expected_ctc', $key)
            ->orwhereIn('trackers.designation', $key)
            ->orwhereIn('trackers.current_location', $key)
            ->orwhereIn('trackers.preffered_location', $key)
            ->orwhereIn('trackers.key_skills', $key)
            ->orwhereIn('trackers.experience', $key);
        }

        $data =$data->paginate(100);
        return response()->json(['data' => $data], 200);
    }
    public function getUniqueSource()
    {
        $data =Tracker::distinct()->pluck('reference');
        $dataUser =DB::table('trackers')
        ->join('sub_users','sub_users.id','=','trackers.added_by')
        ->join('all_users','all_users.id','trackers.employer_id')
        ->join('empcompaniesdetails','empcompaniesdetails.id','all_users.company_id')
        ->select('trackers.added_by','sub_users.email','sub_users.fname','sub_users.lname','empcompaniesdetails.company_name')->distinct()->get();
        // $dataUser =Tracker::Join('sub_users','all_users.id','trackers.employer_id')->distinct()->pluck('all_users.email');

        return response()->json(['data'=>$data,'addedBy'=>$dataUser]);
    }

    public function exportBulkData()
    {
        $today = date('d-m-Y');
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=tracker-export'.$today.'.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $list = DB::table('trackers')
        ->join('sub_users','sub_users.id','=','trackers.added_by')
            ->select('trackers.*','sub_users.email as emp_email','sub_users.fname as emp_name')
            ->orderBy('id', 'desc')
            ->get(); 
            $no =0;
            
        $list = collect($list)->map(function ($x ,$no)  {
            $exp = $x->experience;
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $exp))
                {
                    $exp =str_replace('-', ' to ', $exp);
                }
            return [
                'S.No' => $no +1,
                'Name' => $x->name,
                'Email' => $x->email,
                'Contact' => $x->contact,
                'Gender' => $x->gender ? $x->gender :'Not Available',
                'Skill Sets' => $x->key_skills ? $x->key_skills :'Not Available',
                'Notice Period' => $x->notice_period ? $x->notice_period :'Not Available',
                'Designation' => $x->designation ? $x->designation :'Not Available',
                'Experience(in Yr)' => $exp ? $exp:'Not Available',
                'Expected CTC' => $x->expected_ctc ? $x->expected_ctc :'Not Available',
                'Current CTC' => $x->current_ctc ? $x->current_ctc :'Not Available',
                'Current Location' => $x->current_location ? $x->current_location :'Not Available',
                'Preffered Location' => $x->preffered_location ? $x->preffered_location :'Not Available',
                'Resume' => $x->resume ? url('/tracker/resume/' . $x->resume) : 'Not Available',
                'Source' => $x->reference ? $x->reference :'Not Available',
                'Added By' => $x->emp_email ? $x->emp_email :'Not Available',
                'Date' => $x->created_at
                // 'Resume' => $x->resume ? url('resume/' . $x->resume) : 'Not Available',
                // 'Video Resume' => $x->resume_video_link ? $x->resume_video_link : 'Not Available',
            ];
        })->toArray();

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function () use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return Response::stream($callback, 200, $headers);
    }
    public function ExportBulkCheckedData($id)
    {
        $today = date('d-m-Y');
        $ids = explode(',', $id);
        $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
                'Content-type'        => 'text/csv',
                'Content-Disposition' => 'attachment; filename=tracker-export'.$today.'.csv',
                'Expires'             => '0',
                'Pragma'              => 'public'
            ];
    
            $list = DB::table('trackers')
        ->join('sub_users','sub_users.id','=','trackers.added_by')
            ->select('trackers.*','sub_users.email as emp_email','sub_users.fname as emp_name')
            ->orderBy('id', 'desc')
            ->whereIn('trackers.id', $ids)
            ->get(); 
          $no =0;  
        $list = collect($list)->map(function ($x,$no)  {
            $exp = $x->experience;
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $exp))
                {
                    $exp =str_replace('-', ' to ', $exp);
                }
            return [
                'S.No' => $no +1,
                'Name' => $x->name,
                'Email' => $x->email,
                'Contact' => $x->contact,
                'Gender' => $x->gender ? $x->gender :'Not Available',
                'Skill Sets' => $x->key_skills ? $x->key_skills :'Not Available',
                'Notice Period' => $x->notice_period ? $x->notice_period :'Not Available',
                'Designation' => $x->designation ? $x->designation :'Not Available',
                'Experience(in Yr)' => $exp ? $exp:'Not Available',
                'Expected CTC' => $x->expected_ctc ? $x->expected_ctc :'Not Available',
                'Current CTC' => $x->current_ctc ? $x->current_ctc :'Not Available',
                'Current Location' => $x->current_location ? $x->current_location :'Not Available',
                'Preffered Location' => $x->preffered_location ? $x->preffered_location :'Not Available',
                'Resume' => $x->resume ? url('/tracker/resume/' . $x->resume) : 'Not Available',
                'Source' => $x->reference ? $x->reference :'Not Available',
                'Added By' => $x->emp_email ? $x->emp_email :'Not Available',
                'Date' => $x->created_at
                // 'Resume' => $x->resume ? url('resume/' . $x->resume) : 'Not Available',
                // 'Video Resume' => $x->resume_video_link ? $x->resume_video_link : 'Not Available',
            ];
        })->toArray();
    
            # add headers for each column in the CSV download
            array_unshift($list, array_keys($list[0]));
    
            $callback = function () use ($list) {
                $FH = fopen('php://output', 'w');
                foreach ($list as $row) {
                    fputcsv($FH, $row);
                }
                fclose($FH);
            };
    
            return Response::stream($callback, 200, $headers);
    }
    public function DeleteCheckedData($id)
    {
        $ids = explode(',', $id);

        $list = DB::table('trackers')
            ->whereIn('id', $ids)
            ->delete();
    }
    public function checkEmailTracker($email)
    {

        $companyId = Session::get('user')['company_id'];
        $data = Tracker::select('email')->where('email',$email)->where('company_id',$companyId)->first();
        //$res=sizeof($data)

        return response()->json([
            'data'=>$data
        ],200);
        
    }
   public function getsingleTrackerDetails($id)
    {
        $data =Tracker::Join('sub_users','sub_users.id','trackers.added_by')
        ->join('all_users','all_users.id','trackers.employer_id')
        ->join('empcompaniesdetails','empcompaniesdetails.id','all_users.company_id')
        ->select('trackers.*','sub_users.fname','sub_users.lname','sub_users.email as emp_email','empcompaniesdetails.company_name')
        ->where('trackers.id',$id)
        ->first();

        return response()->json(['data' => $data]);
    }

     
}
