<?php 

class Mage extends Character {

    protected $magicPoints = 100;
    

    public function __construct($name){
        parent::__construct($name);
        $this->damage /= 3;
    }

    public function action($target){
        if($this->magicPoints === 0){
            return $this->staff($target);
        }
        else{
            return $this->fireball($target);
        }
    }

    public function fireball($target){
        $cout = rand(1, 20);
        if($cout > $this->magicPoints){
            $cout = $this->magicPoints;
        }
        $this->magicPoints -= $cout;
        $hit = round($cout * rand(7 , 25) / 10);
        $hit = $target->hurt($hit);
        $detail = "$this->name a attaqué $target->name avec une boule de feu, il lui a infligé $hit points de dégâts en utilisant $cout points de magie. Il lui reste $this->magicPoints points de magie.";
        return $detail;
    }

    public function staff($target){
        $hit = $this->damage;
        $hit = $target->hurt($hit);
        $detail = "$this->name a attaqué $target->name avec un bâton, il lui a infligé $hit points de dégâts.";
        return $detail;
    }

    public function getMagicPoints(){
        return $this->magicPoints;
    }

}