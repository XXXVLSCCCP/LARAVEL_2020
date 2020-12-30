<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Library\Interfaces\CalcInterface;
use Session;
use SuperCalc;


class CalculatorController extends Controller
{



    public function index() {


        $calc = app(CalcInterface::class);

        dump($calc);

        $calc2 = app(CalcInterface::class);

        dump($calc2);

        $calc3 = SuperCalc::add(3);

        dd($calc3);

        $pow = function ($value) {
            return $value*$value;
        };

        $result = Calc::createCalc(6)
                        ->add(4)
                        ->sub(7)
                        ->sub(2)
                        ->add(3)
                        ->apply($pow)
                        ->apply(function ($value) {
                            return $value/2;
                        })
                        ->result();


        //$result = $this->calculator->add(4)->sub(7)->sub(2)->add(3)->getResult();

        return view('calculator',[
            'result' => $result,
        ]);

    }

}


