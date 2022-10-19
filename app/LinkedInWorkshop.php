<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedInWorkshop extends Model
{
    protected $table = 'linkedin_dominaiton_workshop';
    // public $timestamps = false;
    protected $fillable = ['name', 'email', 'contact'];

}
