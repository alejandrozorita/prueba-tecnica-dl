<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $connection = 'mysql';
    public $primaryKey = 'dept_no';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employer::class, 'dept_emp', 'dept_no', 'emp_no')->withPivot('from_date', 'to_date');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function managers()
    {
        return $this->belongsToMany(Employer::class, 'dept_manager', 'dept_no', 'emp_no')->withPivot('from_date', 'to_date');
    }
}
