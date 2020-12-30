<?php


namespace App\Library;
use App\Library\Intefaces\CalcInterface;
use Closure;

class Calc implements CalcInterface
{
    protected $total;

    public function __construct($total = 0)
    {
        $this->total = $total;
    }

    public static function createCalc($total = 0)
    {
        return new self($total);
    }

    public function add(int $amount)
    {
        $this->total += $amount;

        return $this;
    }

    public function sub(int $amount)
    {
        $this->total -= $amount;

        return $this;
    }

    public function apply(Closure $closure)
    {
        $this->total = $closure($this->total);

        return $this;
    }

    public function result()
    {
        return $this->total;
    }




}
