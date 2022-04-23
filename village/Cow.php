<?php

namespace Village;

class Cow extends Animal
{

    public function __construct($name)
    {
        parent::__construct($name);


    }

    public function produce() : int
    {
        return random_int(8,12);
    }

    public function getInfo() : string
    {
        return "Cow №". $this->id ." : name: ". $this->name;
    }

    public function getType() : string
    {
        return "Cow";
    }

    public function getProduct() : string
    {
        return "Liters of milk";
    }
}