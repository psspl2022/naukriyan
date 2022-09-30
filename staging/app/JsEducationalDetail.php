<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsEducationalDetail extends Model
{
    public function jobSeekers() {
        return $this->belongsTo(Jobseeker::class);
    }
}
