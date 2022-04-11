<?php

namespace Village;

class Farm
{
    public string $name;
    public $animals;

    public function __construct($name,$animals = []){
        $this->name = $name;
        $this->animals = $animals;
    }

    public function addAnimal($animal){

        $lastId = 0;

        if(!empty($this->animals)){
            $lastAnimal = end($this->animals);
            $lastId = $lastAnimal->getId();
        }

        $animal->setId($lastId + 1);
        $this->animals[] = $animal;
    }

    public function getHeadCount(){
        $temp = [];
        foreach ($this->animals as $animal){
            $temp[$animal->getType()][] = $animal;
        }
        foreach ($temp as $type=>$item){
            $count[$type] = sizeof($temp[$type]);
        }
        return $count;
    }

    public function oneWeekProduct(){
        $products = [];
        for ($i=0;$i<7;$i++){
            foreach ($this->animals as $animal){
                if(!isset($products[$animal->getProduct()]))
                    $products[$animal->getProduct()] = $animal->produce();
                else{
                    $products[$animal->getProduct()] += $animal->produce();
                }
            }
        }

        return $products;
    }
}