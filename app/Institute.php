<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = 'institute';
    protected $fillable = ['name'];
    
    // public function jobSeekers() {
    //     return $this->belongsTo(Jobseeker::class);
    // }
}
