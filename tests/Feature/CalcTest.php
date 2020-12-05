<?php

namespace Tests\Unit;

use Tests\TestCase;
use app\library\Calc;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalcTest extends TestCase
{

    public function if_calcul_correct()
    {

        $calc = New Calc();
        $result = $calc->add(1)->$calc->sub(1)->$calc->add(1)->$calc->sub(1)->getResult();

        $this->assertEquals(0,$result);

    }
}
