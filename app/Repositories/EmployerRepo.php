<?php

namespace App\Repositories;

use App\Http\Resources\EmployerCollection;
use App\Models\Employer;
use Carbon\Carbon;

class EmployerRepo extends Employer
{

    public function getPagiante($num = 10)
    {
        return Employer::paginate($num);
    }


    public function find($emp_no)
    {
        return Employer::find($emp_no);
    }


    public function getCustomData($value)
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $this->{$value})->format('d/m/Y');
        } catch (Exception $e) {
            return $this->{$value};
        }
    }


    public function getGender()
    {
        return ($this->gender === 'M') ? 'Masculino' : 'Femenino';
    }


    public function jsonSerialize()
    {
        return [
          'emp_no' => $this->emp_no,
          'birth_date' => $this->getCustomData('birth_date'),
          'first_name' => $this->first_name,
          'last_name' => $this->last_name,
          'gender' => $this->getGender(),
          'hire_date' => $this->getCustomData('hire_date'),
        ];
    }

}