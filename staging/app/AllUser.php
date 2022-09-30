<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllUser extends Model
{
    public function jobmanager()
    {
        return $this->hasMany(Jobmanager::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function functional_role()
    {
        return $this->belongsTo(FunctionalRole::class, 'functionalrole_id');
    }
}
