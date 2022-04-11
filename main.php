<?php

require "classes/Cow.php";
require "classes/Chicken.php";
//require "classes/Draft_Farm.php";

use Village\Cow;
use Village\Chicken;
//use Village\Farm;


$randomNames = [
    'Johnathon',
    'Anthony',
    'Erasmo',
    'Raleigh',
    'Nancie',
    'Tama',
    'Camellia',
    'Augustine',
    'Christeen',
    'Luz',
    'Diego',
    'Lyndia',
    'Thomas',
    'Georgianna',
    'Leigha',
    'Alejandro',
    'Marquis',
    'Joan',
    'Stephania',
    'Elroy',
    'Zonia',
    'Buffy',
    'Sharie',
    'Blythe',
    'Gaylene',
    'Elida',
    'Randy',
    'Margarete',
    'Margarett',
    ]; // не нужная фишка

//$farm = new Farm('my barn');

$farm = new class{

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

};

for($i = 0; $i < 10; $i++){
    $farm->addAnimal( new Cow( $randomNames[array_rand($randomNames)],random_int(8,11))); // случайные производимость и имя
}
for($i = 0; $i < 20; $i++){
    $farm->addAnimal( new Chicken( $randomNames[array_rand($randomNames)],random_int(1,3))); // случайные производимость и имя
}

print_r($farm->getHeadCount());
print_r($farm->oneWeekProduct());

for($i = 0; $i < 5; $i++){
    $farm->addAnimal( new Chicken( $randomNames[array_rand($randomNames)],random_int(1,3)));
}

$farm->addAnimal(  new Cow( $randomNames[array_rand($randomNames)],random_int(8,11)));

print_r($farm->getHeadCount());
print_r($farm->oneWeekProduct());
//print_r($farm->animals);
