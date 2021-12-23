<?php
    class Animal{
        public $pattes;
        public $cris;
        public $agilites;
        public $vitesses;
        public $poids;
        public $habitudeAlimentaires;

        public function __construct($pattes,$cris,$agilites,$vitesses,$poids,$habitudeAlimentaires)
        {
            $this->pattes = $pattes ;
            $this->agilites=$agilites;
            $this->cris=$cris;
            $this->vitesses=$vitesses;
            $this->poids=$poids;
            $this->habitudeAlimentaires=$habitudeAlimentaires;
        }

        public function __toString()
        {
            return "Je suis un ".$this->name." , j'ai ".$this->pattes." pattes ,"." mon cri est le ".$this->cris." , j'ai une agilité de ".$this->agilites."/10 ,"." je peux me déplacer à une vitesse de ".$this->vitesses." km/h . "." Je pèse environ ".$this->poids." kg "." et je suis ".$this->habitudeAlimentaires;; 
        }

    }

    class Chat extends Animal{
        public $name = "Chat";
    }

    class Chien extends Animal{
        public $name = "Chien";
    }
?>