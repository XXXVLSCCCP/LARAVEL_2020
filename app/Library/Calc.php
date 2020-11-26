<?php


namespace App\Library;


class Calc
{
    protected $total;

    public function __construct($total=0){

        $this->total=$total;

    }
    public function add($amoun){

        $this->total += $amoun;


        return $this;

    }

    public function sub($amoun){

        $this->total -= $amoun;

        return $this;

    }

    public function thisResult($amoun){

        return $this->total;



    }


}
