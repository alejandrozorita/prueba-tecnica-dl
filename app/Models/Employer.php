<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employees';
    protected $connection = 'mysql';


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


    public function getBirthDate()
    {
        try {
           return Carbon::createFromFormat('Y-m-d', $this->birth_date)->format('m/d/Y');
        } catch (Exception $e) {
            return $this->birth_date;
        }
    }

}
