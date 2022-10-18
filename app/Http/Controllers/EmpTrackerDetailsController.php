<?php

namespace App\Http\Controllers;


use File;
use App\SubUser;
use App\Tracker;
use App\Reference;
use App\DesignationList;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class EmpTrackerDetailsController extends Controller
{
    public function index(Request $request)
    {
        
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $source = $request->source;
        $location = $request->location;
        $skills = $request->skills;
        $userid = $request->userid;
        $keyword = $request->keyword;
        $designation = $request->designation;
        $view_per_page =$request->view_per_page ?? 50;
        
        $resume_upload = $request->resume_upload;
        $uploaded = $resume_upload ==='yes';
        $Notuploaded = $resume_upload ==='no';

        $experience = $request->experience;

        $EmpId = Session::get('user')['id'];

        $data =Tracker::join('sub_users','sub_users.id','=','trackers.added_by')
        ->select('trackers.*','sub_users.fname as sub_fname','sub_users.lname as sub_lname')
        ->where('employer_id',$EmpId)->orderBy('id', 'desc');

        if (isset($source) && $source != '') {
            $data->Where('reference', $source);
        }
        
         if (isset($designation) && $designation != '') {
            $data->Where('trackers.designation', $designation);
        }
        
        if (isset($experience) && $experience != '') {
            $data->Where('trackers.experience', $experience);
        }

        if (isset($uploaded) && $uploaded != '') {
            $data->WhereNotNull('resume');
        }

        if (isset($Notuploaded) && $Notuploaded != '') {
            $data->WhereNull('resume');
        }
        
         if (isset($from_date) && $from_date != '') {
                $data->whereDate('trackers.created_at', '>=', $from_date);
        }
    
        if (isset($to_date) && $to_date != '') {
        $data->whereDate('trackers.created_at', '<=', $to_date);
        }

        if (isset($from_date) && isset($to_date) ) {
            $data->whereBetween('trackers.created_at',[$from_date, $to_date]);
        }


        if (isset($location) && $location != '') {
            $data->Where('current_location', 'like', "%$location%")
            ->orWhere('preffered_location', 'like', "%$location%");
        }

        if (isset($skills) && $skills != '') {
            $key =explode(',',$skills);
            $data->Where(function ($query) use($key) {
                        for ($i = 0; $i < count($key); $i++){
                           $query->where('key_skills', 'like',  '%' . $key[$i] .'%');
                        }      
                   });
        }
        if (isset($skills) && $skills != '') {
            $key = explode(',', $skills);
            ($data)->Where(function ($query) use ($key) {
                for ($i = 0; $i < count($key); $i++) {
                    $query->orWhere('key_skills', 'like',  '%' . $key[$i] . '%');
                }
            });
        }
        if(isset($userid) && $userid != '' && $userid !='undefined') {

            $data->Where('added_by', $userid);
        }

        if (isset($keyword) && $keyword !== '') {
            $data->where(function ($query) use ($keyword) {
                $query->where('current_location', 'like', "%$keyword%")
                ->orwhere('preffered_location', 'like', "%$keyword%")
                ->orWhere('key_skills', 'like', "%$keyword%")
                ->orwhere('reference', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")
                ->orWhere('trackers.email', 'like', "%$keyword%")
                ->orWhere('trackers.contact', $keyword)
                ->orWhere('trackers.gender', $keyword)
                ->orWhere('trackers.designation', 'like', "%$keyword%")
                ->orWhere('experience', 'like', "%$keyword%")
                ->orWhere('current_ctc', 'like', "%$keyword%")
                ->orWhere('expected_ctc', 'like', "%$keyword%");
            });
        }
                

        $trackerList = $data->paginate($view_per_page);
        

        return response()->json(['data' => $trackerList],200);
    }

    public function getUniqueSourceEmployer()
    {
        $employer_id =Session::get('user')['id'];
        $company_id =Session::get('user')['company_id'];
        $data = Reference::where('company_id', $company_id)->where('employer_id', $employer_id)->get();

        return response()->json(['data'=>$data]);
    }
    public function exportTrackerDataEmployer()
    {
        $empId= Session::get('user')['id'];
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
            ->where('employer_id', $empId)
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
    public function getsingleResume($id)
    {
        $data = Tracker::where('id', $id)->select('id','resume','name')->first();

        return response()->json(['data' => $data]);
    }
}
