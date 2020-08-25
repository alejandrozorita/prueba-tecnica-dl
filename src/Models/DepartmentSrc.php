<?php

namespace Src\Models;

use App\Repositories\DepartmentRepo;
use Illuminate\Support\Collection;

class DepartmentSrc
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllManagers(): Collection
    {
        return (new DepartmentRepo())->getAllManagers();
    }

}