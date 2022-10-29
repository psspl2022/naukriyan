<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeBuildingWorkshop extends Model
{
    protected $table = 'resume_building_workshop';
    // public $timestamps = false;
    protected $fillable = ['name', 'email', 'contact'];

}
