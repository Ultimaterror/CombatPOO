<?php 

class Berserker extends Character {

    public $maxLifePoints;

    public function __construct($name){
        Character::__construct($name);
        $this->lifePoints = 90;
        $this->maxLifePoints = $this->lifePoints;
    }

    public function action($target){
        return $this->axe($target);
    }

    public function axe($target){
        $hit = $this->damage;
        if($this->getLifePoints() <= $this->maxLifePoints / 2){
            $hit *= 3;
        }
        $hit = $target->hurt($hit);
        $detail = "$this->name a attaqué $target->name avec une hache, il lui a infligé $hit points de dégâts.";
        return $detail;
    }

}