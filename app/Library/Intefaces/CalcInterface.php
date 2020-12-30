<?php


namespace App\Library\Intefaces;


interface CalcInterface
{
    public function add(int $amount);
    public function sub(int $amount);
    public function result();
}
