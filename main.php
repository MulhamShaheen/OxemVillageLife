<?php

require_once __DIR__ . "/vendor/autoload.php";


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

$farm = new class('My Farm') {
    protected int $lastId = 1;

    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addAnimal(\Village\Animal $animal)
    {

        $animal->id = $this->lastId;
        $this->animals[] = $animal;

        $this->lastId++;
    }

    public function getHeadCount(): array
    {
        $count = [];
        foreach ($this->animals as $animal) {
            if (!isset($count[$animal->getType()]))
                $count[$animal->getType()] = 1;
            else {
                $count[$animal->getType()]++;
            }
        }
        return $count;
    }
    public function printOutHeadCount()
    {
        $count = $this->getHeadCount();
        $output = "";

        foreach ($count as $type => $value) {
            if ($value > 1) $output .= $value . " " . $type . "s" . PHP_EOL;
            else
                $output .= $value . " " . $type . PHP_EOL;

        }
        echo $output;
    }

    public function gatherProducts(int $dayCount = 1): array
    {
        $products = [];
        for ($i = 0; $i < $dayCount; $i++) {
            foreach ($this->animals as $animal) {
                if (!isset($products[$animal->getProduct()]))
                    $products[$animal->getProduct()] = $animal->produce();
                else {
                    $products[$animal->getProduct()] += $animal->produce();
                }
            }
        }

        return $products;
    }

};

for ($i = 0; $i < 10; $i++) {
    $farm->addAnimal(new Village\Cow($randomNames[array_rand($randomNames)], random_int(8, 11))); // случайные производимость и имя
}
for ($i = 0; $i < 20; $i++) {
    $farm->addAnimal(new Village\Chicken($randomNames[array_rand($randomNames)], random_int(1, 3))); // случайные производимость и имя
}

$farm->getHeadCount();
print_r($farm->gatherProducts());

for ($i = 0; $i < 5; $i++) {
    $farm->addAnimal(new Village\Chicken($randomNames[array_rand($randomNames)], random_int(1, 3)));
}

$farm->addAnimal(new Village\Cow($randomNames[array_rand($randomNames)], random_int(8, 11)));

$farm->printOutHeadCount();
print_r($farm->gatherProducts());

