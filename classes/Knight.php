<?php 

class Knight extends Character {

    public $lightShield = false;


    public function action($target){
        $action = rand (1, 5);
        if($action == 1 && !$this->lightShield) { // !$this->lightShield == false
            return $this->castShield();
        }
        else {
            return $this->spear($target);
        }
    }

    public function spear($target){
        $hit = $this->damage;
        $hit = $target->hurt($hit);
        $detail = "$this->name a attaqué $target->name avec une lance, il lui a infligé $hit points de dégâts.";
        return $detail;
    }

    public function castShield(){
        $this->lightShield = true;
        $detail = "$this->name mets en place un bouclier, le prochain coup qu'il recevra sera annulé.";
        return $detail;
    }

    public function hurt($hit) {
        if($this->lightShield){ // $this->lightShield == true
            $this->lightShield = false;
            $hit = 0;
        }
        parent::hurt($hit);
        return $hit;
    }

}