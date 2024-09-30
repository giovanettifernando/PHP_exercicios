<?php
abstract class Veiculo {
    private $marca;
    private $rodas;
    private $capacidadeDoTanque;
    private $volumeDoTanque;
    private $kml;

    public function __construct($marca, $rodas, $capacidadeDoTanque, $volumeDoTanque, $kml) {
        $this->marca = $marca;
        $this->rodas = $rodas;
        $this->capacidadeDoTanque = $capacidadeDoTanque;
        $this->volumeDoTanque = $volumeDoTanque;
        $this->kml = $kml;
    }

    public function getProp($prop) {
        // string com nome da propriedade
        return $this->$prop;
    }

    public function deslocamento($kms) {
        $combustivelNecessario = $kms / $this->getProp('kml');

        if ($combustivelNecessario <= $this->getProp('volumeDoTanque')) {
            echo 'Você chegou ao seu destino';
            $this->volumeDoTanque = $this->getProp('volumeDoTanque') - $combustivelNecessario;
            echo '. Restam ' . $this->getProp('volumeDoTanque') . ' litros. Sendo assim, você pode andar mais ' . ($this->getProp('volumeDoTanque') * $this->getProp('kml')) . " km\n";
            return true;
        } else if ($this->getProp('volumeDoTanque') === 0) {
            echo "Carro sem combustível\n";
            return false;
        } else if ($combustivelNecessario > $this->getProp('volumeDoTanque')) {
            echo 'Reabasteça antes de atingir os ' . ($this->getProp('volumeDoTanque') * $this->getProp('kml')) . " km\n";
            return false;
        }
    }

    public function abastecer() {
        if ($this->getProp('volumeDoTanque') < $this->getProp('capacidadeDoTanque')) {
            $this->volumeDoTanque = $this->getProp('capacidadeDoTanque');
            return "Tanque cheio\n";
        } else if ($this->getProp('volumeDoTanque') == $this->getProp('capacidadeDoTanque')) {
            return "Não é necessário abastecer\n";
        }
    }
}

class Carro extends Veiculo {
    public function __construct($marca, $capacidadeDoTanque, $volumeDoTanque, $kml) {
        $rodas = 4;
        parent::__construct($marca, $rodas, $capacidadeDoTanque, $volumeDoTanque, $kml); 
    }


    
    public function buzinar() {
        echo "tan tantantan tan tantan\n";
    }

    public function darSeta($lado) {
        if ($lado === 'direita') {
            $texto = '->';
            for ($i = 0; $i <= 5; $i++) {
                echo $texto . "\n";
                usleep(500000);
            }
        }

        if ($lado === 'esquerda') {
            $texto = '<-';
            for ($i = 0; $i <= 5; $i++) {
                echo $texto . "\n";
                usleep(500000);
            }
        }
    }
}

class Moto extends Carro {
    public function __construct($marca, $capacidadeDoTanque, $volumeDoTanque, $kml) {
        $rodas = 2;
        parent::__construct($marca, $capacidadeDoTanque, $volumeDoTanque, $kml); 
    }

    public function fazerRanDanDan() {
        echo "Ran dan dan dandan\n";
    }
}

class Triciclo extends Moto {
    public function __construct($marca, $capacidadeDoTanque, $volumeDoTanque, $kml) {
        $rodas = 3;
        parent::__construct($marca, $capacidadeDoTanque, $volumeDoTanque, $kml);
        $this->rodas = 3; 
    }

    public function tocarBornToBeWild() {
       echo "BOOOOORN TO BE WIIIIIIIIIIILD\n";
    }
}

// $batMovel = new Carro('Wayne', 4, 100, 100, 15);
// $batMovel->darSeta('esquerda');
// $batMovel->buzinar();
// $batMovel->deslocamento(20);
// echo $batMovel->abastecer();

// $graceChopper = new Moto('Harley Davidson', 2, 50, 50, 5);
// $graceChopper->darSeta('direita');
// $graceChopper->buzinar();
// $graceChopper->fazerRanDanDan();
// $graceChopper->deslocamento(20);
// echo $graceChopper->abastecer();


$bigWheelTricycle = new Triciclo('The Eliminator', 70, 70, 10);
$bigWheelTricycle->darSeta('esquerda');
$bigWheelTricycle->buzinar();
$bigWheelTricycle->fazerRanDanDan();
$bigWheelTricycle->tocarBornToBeWild();
$bigWheelTricycle->deslocamento(900);
echo $bigWheelTricycle->abastecer();
echo $bigWheelTricycle->getProp('rodas');


















?>
