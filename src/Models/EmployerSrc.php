<?php

namespace Src\Models;

use App\Repositories\EmployerRepo;

class EmployerSrc
{

    /**
     * @param  int  $num
     *
     * @return mixed
     */
    public function getPaginate($num = 10)
    {
        return (new EmployerRepo())->getPagiante($num);
    }


    /**
     * @param $emp_no
     *
     * @return mixed
     */
    public function find($emp_no)
    {
        return (new EmployerRepo())->find($emp_no);
    }


    /**
     * @param $manager
     * @param $dateTo
     * @param $dateFrom
     *
     * @return mixed
     */
    public function getEmployersByManager($manager, $dateTo, $dateFrom)
    {
        return (new EmployerRepo())->getEmployersByManager($manager, $dateTo, $dateFrom);
    }

}