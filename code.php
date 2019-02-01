<?php

class Calc
{

    public $price;
    public $period;

    /**
     * Calc constructor.
     * @param $price
     * @param $period
     */

    public function __construct($price, $period) {
        $this->price = $price;
        $this->period = $period;
    }

    /**
     * @return float|int
     */

    public function calculate()
    {
        if (isset($this->price) && isset($this->period)) {
            $month_payment = $this->price / $this->period * 0.25;
            return number_format($month_payment,2);
        }
    }

}

$price = $_GET['sum'];
$period = $_GET['period'];

    if(isset($price) > 0 && isset($period) > 0) {
        $car = new Calc($price, $period);
        $output = $car->calculate();
        $output = json_decode(json_encode($output),true);
        echo "{$output} $ for {$period} months";
    } else {
        echo 'Incorrect data';
    }
