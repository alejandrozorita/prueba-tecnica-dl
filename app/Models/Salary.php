<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';

    public function employer()
    {
        return $this->belongsTo(Employer::class,'emp_no','emp_no');
    }
}
