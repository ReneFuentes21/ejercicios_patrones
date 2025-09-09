<?php


interface StratergyOut{
    public function showMessage();
}


class Console implements StratergyOut{
    public function showMessage()
    {
        echo "Mensaje por consola";
    }
}

class JSON implements StratergyOut{
    public function showMessage()
    {
        echo "Mensaje por formato JSON";
    }
}

class TXTOut implements StratergyOut{
    public function showMessage()
    {
        echo "Mensaje por archivo txt";
    }
}

class MessageOut{
    private StratergyOut $salida;

    public function elegirSalida(StratergyOut $metodo){
        $this->salida = $metodo;
    }
    public function mostrandoSalida(){
        return $this->salida->showMessage();
    }
    
}

$mensaje1 = new MessageOut();
$mensaje1 ->elegirSalida(new JSON);
echo $mensaje1->mostrandoSalida();