<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsResume extends Model
{
    protected $guarded = [];

    public function jobSeekers() {
        return $this->belongsTo(Jobseeker::class);
    }
}
