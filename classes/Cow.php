<?php

namespace Village;

class Cow extends Animal
{
    public int $avProduction;

    public function __construct($name,$avProduction = 10)
    {
        parent::__construct($name);

        $this->avProduction = $avProduction;

    }

    public function produce(){
        return random_int($this->avProduction - 2 ,$this->avProduction +2);
    }

    public function getInfo()
    {
        return "Cow №". $this->getId() ." : name: ". $this->name;
    }

    public function getType()
    {
        return "Cow";
    }

    public function getProduct()
    {
        return "Liters of milk";
    }
}