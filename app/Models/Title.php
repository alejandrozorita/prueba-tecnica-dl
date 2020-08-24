<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'titles';

    public function employer()
    {
        return $this->belongsTo(Employer::class,'emp_no','emp_no');
    }
}
