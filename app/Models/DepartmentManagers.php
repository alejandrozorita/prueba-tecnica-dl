<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentManagers extends Model
{
    protected $table = 'dept_manager';


    /**
     * @param $manager
     * @param $dateTo
     * @param $dateFrom
     *
     * @return mixed
     */
    public static function isManagerBetweenDates($manager, $dateTo, $dateFrom)
    {
        return DepartmentManagers::where('emp_no', $manager)->first();
        //return DepartmentManagers::where('emp_no', $manager)->whereDate('from_date', '<=', $dateFrom)->whereDate('to_date', '>=', $dateTo)->first();
    }

}


