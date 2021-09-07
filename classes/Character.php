<?php 

// abstract : ne peut plus créer directement cette classe
abstract class Character {

    public $name;
    protected $lifePoints = 150;
    protected $damage = 15;


    public function __construct($name){
        $this->name = $name;
    }

    public function hurt($hit) {
        $this->lifePoints -= $hit;
        if($this->lifePoints < 0){
            $this->lifePoints = 0;
        }
        return $hit;
    }

    public function isAlive(){
        if($this->lifePoints > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function status(){
        return get_class($this) . " $this->name : $this->lifePoints";
    }

    // Getter (Méthode pour récupérer un attibut privé)
    public function getLifePoints(){
        return $this->lifePoints;
    }

    // Setter (Méthode pour mofifier un attibut privé)
    public function setLifePoints($value){
        $this->lifePoints = $value;
        return;
    }

}