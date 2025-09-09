<?php
interface IPersonaje{
    public function armas();
}

#clases bases
class Thor implements IPersonaje{
    public function armas()
    {
      return "Thor tiene su martillo mjolnir";  
    }
}

class Iroman implements IPersonaje{
    public function armas(){
        return "Iroman tiene el markIV";
    }
}


class PersonajeDecorator implements IPersonaje{
    protected IPersonaje $personaje;
    
    public function __construct(IPersonaje $personaje)
    {
        $this->personaje = $personaje;
    }


    public function armas(){
        return $this->personaje->armas();
    }    
}

#Decoradores
class StormDecorator extends PersonajeDecorator{
    public function armas(){
        return $this->personaje->armas() . ", Tambien tiene el stormbreaker";
    }
}

class HulkbusterDecorator extends PersonajeDecorator{
    public function armas(){
        return $this->personaje->armas() . ", Y la hulkbuster";
    }    
}

echo "Thor <br>";
$thor = new Thor();
echo $thor->armas();
echo "<br>";
$thor = new StormDecorator($thor);
echo $thor->armas();
echo "<br>";
$thor = new HulkbusterDecorator(($thor));
echo $thor->armas();
echo "<br>";
?>