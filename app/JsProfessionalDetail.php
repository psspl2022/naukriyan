<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsProfessionalDetail extends Model
{
    public function jobSeekers() {
        return $this->belongsTo(Jobseeker::class);
    }
}
