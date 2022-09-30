<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function jobseekers() {
        return $this->belongsTo(Jobseeker::class);
    }
}
