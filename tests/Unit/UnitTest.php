<?php

namespace Tests\Unit;

use App\Repositories\EmployerRepo;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    /** @test */
    public function customData()
    {
        $employerSrc = new EmployerRepo();
        $employerSrc->birth_date = '1970-2-20';
        $employerSrc->hire_date = '1971-3-15';

        $this->assertEquals('20/02/1970', $employerSrc->getCustomData('birth_date'));
        $this->assertEquals('15/03/1971', $employerSrc->getCustomData('hire_date'));
    }


    /** @test */
    public function getGender()
    {
        $employerSrcM = new EmployerRepo();
        $employerSrcM->gender = 'M';
        $employerSrcH = new EmployerRepo();
        $employerSrcH->gender = 'H';
        $this->assertEquals($employerSrcM->getGender(), 'Masculino');
        $this->assertEquals($employerSrcH->getGender(), 'Femenino');
    }

}
