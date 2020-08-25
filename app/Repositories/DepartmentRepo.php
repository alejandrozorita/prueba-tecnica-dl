<?php

namespace App\Repositories;

use App\Models\{Department, DepartmentManagers, Employer};
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DepartmentRepo extends Department
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllManagers(): Collection
    {
        return Employer::whereIn('emp_no', DepartmentManagers::all()->pluck('emp_no')->toArray())->get();
    }


    /**
     * @param $value
     *
     * @return mixed|string
     */
    public function getCustomData($value)
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $this->{$value})->format('d/m/Y');
        } catch (Exception $e) {
            return $this->{$value};
        }
    }


    /**
     * @param $departments
     *
     * @return string
     */
    public function getNames($departments)
    {
        $return = '';
        $lastKey = $departments->keys()->last();
        foreach ($departments as $key => $department) {
            $return .= $department->dept_name;
            if ($lastKey != $key) {
                $return .= ', ';
            }
        }
        return $return;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
          'emp_no' => $this->emp_no,
          'birth_date' => $this->getCustomData('birth_date'),
          'first_name' => $this->first_name,
          'last_name' => $this->last_name,
          'complet_name' => $this->first_name . ' ' . $this->last_name,
          'gender' => $this->getGender(),
          'hire_date' => $this->getCustomData('hire_date'),
          'salary' => $this->salary->salary,
          'titles' => $this->title->title,
          'departments' => $this->getNames($this->departments)
        ];
    }

}