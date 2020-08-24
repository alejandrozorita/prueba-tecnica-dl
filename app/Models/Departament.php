<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $table = 'departments';

    public function employees()
    {
        return $this->belongsToMany(Employer::class, 'dept_emp', 'dept_no', 'emp_no')->withPivot('from_date', 'to_date');;
    }

    public function managers()
    {
        return $this->belongsToMany(Employer::class, 'dept_manager', 'dept_no', 'emp_no')->withPivot('from_date', 'to_date');;
    }
}
