<?php

namespace App\Exports;

use App\Jobseeker;
use DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobseekerExport implements WithHeadings,FromCollection
{
    /**
    * @return Collection
    */
    public function collection()
    {
       
    	$com_export = DB::table('jobseekers')
    	->leftjoin('industries', 'industries.id', '=', 'jobseekers.industry_id')
    	->select('jobseekers.fname','jobseekers.lname','jobseekers.email','jobseekers.gender','jobseekers.contact','industries.category_name','jobseekers.designation','jobseekers.dob','jobseekers.aadhar_no','jobseekers.created_at')
    	
    	->orderBy('jobseekers.id','desc')
    	->get();
        return $com_export;
    }
    public function headings():array{
    	return ['First Name','Last Name','Email','Gender','Contact.','Industry Name','Designation','Date Of Birth','Aadhar No','Created Date'];
    }
}
