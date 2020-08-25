<?php

namespace App\Repositories;

use App\Models\{DepartmentEmployers, DepartmentManagers, Employer};

class EmployerRepo extends Employer
{

    /**
     * @param  int  $num
     *
     * @return mixed
     */
    public function getPagiante($num = 10)
    {
        return Employer::paginate($num);
    }


    /**
     * @param $emp_no
     *
     * @return mixed
     */
    public function find($emp_no)
    {
        return Employer::find($emp_no);
    }


    /**
     * @param $manager
     * @param $dateTo
     * @param $dateFrom
     *
     * @return \Illuminate\Support\Collection
     */
    public function getEmployersByManager($manager, $dateTo, $dateFrom)
    {
        $managerDepartment = DepartmentManagers::isManagerBetweenDates($manager, $dateTo, $dateFrom);
        if (! $managerDepartment) {
            return null;
        }
        return DepartmentEmployers::employersDepartmenBetweenDates($managerDepartment->dept_no, $dateTo, $dateFrom);
    }

}