<?php

namespace Village;

class Chicken extends Animal
{

    public function __construct($name,$avProduction = 0.5)
    {
        parent::__construct($name);

        $this->avProduction = $avProduction;

    }

    public function produce() : int
    {
        return (random_int(0,1));
    }

    public function getInfo(): string
    {
        return "Chicken №". $this->id ." : name: ". $this->name;
    }

    public function getType() : string
    {
        return "Chicken";
    }

    public function getProduct() : string
    {
        return "Eggs";
    }

}