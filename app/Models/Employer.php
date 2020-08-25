<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employees';
    protected $connection = 'mysql';
    public $primaryKey = 'emp_no';


    public function departments()
    {
        return $this->belongsToMany(Departament::class, 'dept_emp', 'emp_no', 'dept_no')->withPivot('from_date', 'to_date');
    }


    public function manager()
    {
        return $this->belongsToMany(Departament::class, 'dept_manager', 'emp_no', 'dept_no')->withPivot('from_date', 'to_date');;
    }


    public function salary()
    {
        return $this->hasOne(Salary::class, 'emp_no', 'emp_no');
    }


    public function title()
    {
        return $this->hasOne(Title::class, 'emp_no', 'emp_no');
    }

}
