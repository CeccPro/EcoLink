<?php
    class Planta {
        private array $text;
        private string $name;
        private string $id;
        private string $image;

        public function __construct($name, $id, $image, $text){
            $this->name = $name;
            $this->id = $id;
            $this->image = $image;
            $this->text = $text;
        }

        public function getText(){
            return $this->text;
        }

        public function getName(){
            return $this->name;
        }

        public function getID(){
            return $this->id;
        }

        public function getImage(){
            return $this->image;
        }
    }

    class Plantas {
        private array $plantas = [];

        public function addPlant(Planta $plant){
            $this->plantas[] = $plant;
        }

        public function getData(){
            return $this->plantas;
        }

        public function matchID($plantID){
            foreach($this->plantas as $planta){
                if(mb_strtolower($planta->getID()) == mb_strtolower($plantID)){
                    return $planta;
                }
            }
            return "ERROR. $plantID: ID No reconocido";
        }
    }
?>