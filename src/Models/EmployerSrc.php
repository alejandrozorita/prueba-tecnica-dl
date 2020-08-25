<?php

namespace Src\Models;

use App\Repositories\EmployerRepo;

class EmployerSrc
{

    public function getPaginate($num = 10)
    {
        return (new EmployerRepo())->getPagiante($num);
    }

    public function find($emp_no)
    {
        return (new EmployerRepo())->find($emp_no);
    }

}