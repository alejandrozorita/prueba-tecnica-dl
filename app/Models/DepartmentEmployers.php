<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentEmployers extends Model
{
    protected $table = 'dept_emp';


    /**
     * @param $dept_no
     * @param $dateTo
     * @param $dateFrom
     *
     * @return mixed
     */
    public static function employersDepartmenBetweenDates($dept_no, $dateTo, $dateFrom, $num = 10)
    {
        return Employer::whereIn('emp_no',DepartmentEmployers::where('dept_no', $dept_no)->whereDate('from_date', '<=', $dateFrom)->whereDate('to_date', '>=', $dateTo)->pluck('emp_no')->toArray())->paginate($num);
    }
}
