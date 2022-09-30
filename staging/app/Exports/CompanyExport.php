<?php

namespace App\Exports;

use App\Empcompaniesdetail;
use DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyExport implements WithHeadings,FromCollection
{
    /**
    * @return Collection
    */
    public function collection()
    {
    	
    	$com_export = DB::table('empcompaniesdetails')
    	->leftjoin('industries', 'industries.id', '=', 'empcompaniesdetails.company_industry')
    	->select('empcompaniesdetails.company_name','empcompaniesdetails.com_contact','empcompaniesdetails.com_email','industries.category_name','empcompaniesdetails.cin_no','empcompaniesdetails.no_of_employee','empcompaniesdetails.created_at')
    	->orderBy('empcompaniesdetails.id','desc')
    	->get();
        return $com_export;
        
    }
    public function headings():array{
    	return ['Company Name','Contact No','Email','Industry Name','CIN NO.','No Of Employee','Add Date'];
    }
}
