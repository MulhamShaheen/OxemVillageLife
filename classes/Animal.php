<?php

namespace Village;

abstract class Animal
{
    public int $id;
    public string $name;

    public function __construct($name)
    {
        $this->id = 0; // животное без Barn умеет нулевой номер
        $this->name = $name;
    }

    abstract protected function produce(); //делать продукт
    abstract protected function getInfo(); //поулчить инфу о животном
    abstract protected function getType(); //поулчить тип животного
    abstract protected function getProduct(); //поулчить тип продукта животного
}