<?php

namespace Tests\Feature;

use App\Models\Employer;
use App\Repositories\EmployerRepo;
use Src\Models\EmployerSrc;
use Tests\TestCase;

class FeatureTest extends TestCase
{
    /** @test */
    public function homeCarga()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** @test */
    public function paginaNoExiste404()
    {
        $response = $this->get('/no-existo');

        $response->assertStatus(404);
    }


    /** @test */
    public function obtenerEmployer()
    {
        $employerBD = Employer::first();
        $employerSrc = $this->getEmployer();
        $this->assertEquals($employerBD->emp_no, $employerSrc->emp_no);
        $this->assertEquals($employerBD->first_name, $employerSrc->first_name);
        $this->assertEquals($employerBD->last_name, $employerSrc->last_name);
        $this->assertEquals($employerBD->birth_date, $employerSrc->birth_date);
        $this->assertEquals($employerBD->hire_date, $employerSrc->hire_date);
        $this->assertEquals($employerBD->gender, $employerSrc->gender);
    }


    /** @test */
    public function obtenerSerialize()
    {

        $employerOrigin = factory(EmployerRepo::class)->make();
        $employer = json_encode($employerOrigin);
        $employer = json_decode($employer, true);

        $this->assertEquals($employerOrigin->emp_no, $employer['emp_no']);
        $this->assertEquals($employerOrigin->getCustomData('birth_date'), $employer['birth_date']);
        $this->assertEquals($employerOrigin->first_name, $employer['first_name']);
        $this->assertEquals($employerOrigin->getGender(), $employer['gender']);
        $this->assertEquals($employerOrigin->getCustomData('hire_date'), $employer['hire_date']);
    }


    private function getEmployer()
    {
        return (new EmployerSrc())->getPaginate(10)->first();
    }

}
