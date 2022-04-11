<?php

namespace Village;

class Chicken extends Animal
{
    public float $avProduction; // среднее количества продукции за раз


    public function __construct($name,$avProduction = 0.5)
    {
        parent::__construct($name);

        $this->avProduction = $avProduction;

    }

    public function produce(){
        return (random_int($this->avProduction - 0.5 ,$this->avProduction + 0.5));
    }

    public function getInfo()
    {
        return "Chicken №". $this->getId() ." : name: ". $this->name;
    }

    public function getType()
    {
        return "Chicken";
    }

    public function getProduct()
    {
        return "Eggs";
    }

}