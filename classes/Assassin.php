<?php 

class Assassin extends Character {

    public function __construct($name){
        Character::__construct($name);
        $this->damage *= 2;
    }

    public function action($target){
        return $this->dagger($target);
    }

    public function dagger($target){
        $hit = $this->damage;
        $hit = $target->hurt($hit);
        $detail = "$this->name a attaqué $target->name avec une dague, il lui a infligé $hit points de dégâts.";
        return $detail;
    }

    public function hurt($hit) {
        $hit *= 2;
        parent::hurt($hit);
        return $hit;
    }

}