<?php

interface IActions {
    public function speed();
    public function attack();
}

class Esqueleto implements IActions{
    public function speed(){
        echo "El esqueleto es rapido";
    }

    public function attack()
    {
        echo "El esqueleto tiene 2 de ataque";
    }
}

class Zombie implements IActions{
    public function speed(){
        echo "El zombie es lento";
    }

    public function attack()
    {
        echo "El zombie tiene 5 de ataque";
    }
}

class CharacterFactory{
    public static function createCharacter($nivel) : IActions{
        if($nivel == "facil"){
            return new Esqueleto();
        }else if($nivel == "dificil"){
            return new Zombie();
        }else{
            throw new Exception("Elija un grado de dificultad");
        }
    }
}

$esqueleto = CharacterFactory::createCharacter('facil');
$esqueleto->speed();