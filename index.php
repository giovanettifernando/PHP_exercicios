<?php 

abstract class House {
    private $rooms; 
    private $adress;
    private $floors;

    public function __construct($rooms, $adress, $floors) {
        $this->rooms = $rooms;
        $this->adress = $adress;
        $this->floors = $floors;
    }


    function getRooms() {
        return $this->rooms;
    }
}

class Kitnet extends House {
    function welcome() {
        echo 'bem-vindo ao meu apartamento de '. $this->rooms. ' comodos';
    }
}

$house = new Kitnet (3, 'bento freitas', 1);

echo $house->welcome();

echo $house->getRooms(3);
?>



