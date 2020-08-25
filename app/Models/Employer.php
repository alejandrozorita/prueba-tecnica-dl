<?php

namespace App\Models;

use App\Repositories\DepartmentRepo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employees';
    protected $connection = 'mysql';
    public $primaryKey = 'emp_no';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'dept_emp', 'emp_no', 'dept_no')->withPivot('from_date', 'to_date');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function manager()
    {
        return $this->belongsToMany(Department::class, 'dept_manager', 'emp_no', 'dept_no')->withPivot('from_date', 'to_date');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salary()
    {
        return $this->hasOne(Salary::class, 'emp_no', 'emp_no');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function title()
    {
        return $this->hasOne(Title::class, 'emp_no', 'emp_no');
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
     * @return string
     */
    public function getGender()
    {
        return ($this->gender === 'M') ? 'Masculino' : 'Femenino';
    }


    /**
     * Convert the object into something JSON serializable.
     *
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
          'salary' => ($this->salary->salary) ?? 0,
          'titles' => ($this->title->title) ?? '',
          'departments' => (new DepartmentRepo())->getNames($this->departments)
        ];
    }

}
