<?php

namespace Village;

abstract class Animal
{
    public $id;
    public string $name;

    public function __construct($name)
    {
        $this->setId(0); // животное без Barn умеет нулевой номер
        $this->name = $name;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    abstract protected function produce();
    abstract protected function getInfo();
    abstract protected function getType();
    abstract protected function getProduct();
}