<?php 

class Warrior extends Character {

    public function action($target){
        return $this->sword($target);
    }

    public function sword($target){
        $hit = $this->damage;
        $hit = $target->hurt($hit);
        $detail = "$this->name a attaqué $target->name avec une épée, il lui a infligé $hit points de dégâts.";
        return $detail;
    }

}