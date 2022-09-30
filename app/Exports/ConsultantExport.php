<?php

namespace App\Exports;

use App\AllUser;
use DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsultantExport implements WithHeadings,FromCollection
{
    /**
    * @return Collection
    */
    public function collection()
    {
        $user_type='Consultant';
    	$com_export = DB::table('all_users')
    	->leftjoin('industries', 'industries.id', '=', 'all_users.industry_id')
    	->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'all_users.company_id')
    	->select('all_users.fname','all_users.lname','all_users.email','all_users.gender','all_users.contact','industries.category_name','empcompaniesdetails.company_name','all_users.dob','all_users.created_at')
    	->where('all_users.user_type',$user_type)
    	->orderBy('all_users.id','desc')
    	->get();
        return $com_export;
    }
    public function headings():array{
    	return ['First Name','Last Name','Email','Gender','Contact.','Industry Name','Company Name','Date Of Birth','Created Date'];
    }
}
