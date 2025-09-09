<?php 

interface IDocument{
    public function openDocument();
}

#interfaz para los archivos que sean de la version 7
interface IDocuments7{
    public function open();
}

class Word7 implements IDocuments7{
    public function open(){
        echo "Abriendo un documento en word 7";
    }
}

class Excel7 implements IDocuments7{
    public function open(){
        echo "Abriendo un documento en excel 7";
    }
}

class Word10 implements IDocument{
    public function openDocument()
    {
        echo "Abriendo un word 10";
    }
}

class AdapterDoc implements IDocument{
    private IDocuments7 $documento;

    public function __construct(IDocuments7 $doc)
    {
        $this->documento=$doc;
    }
    
    public function openDocument()
    {
        echo "Adaptando documentos de la version 7 a la 10<br>";
        $this->documento->open();
    }   
}

/**class AdapterDocExcel7 implements IDocuments7{
    private IDocuments7 $documento;

    public function __construct(IDocuments7 $doc)
    {
        $this->documento=$doc;
    }
    
    public function openDocument()
    {
        echo "Adaptando documentos de la version 7 a la 10";
        $this->documento->open();
    }   
}*/

#clase general que recibe los documentos
class Widows10System{
    public function verDocs(IDocument $doc){
        return $doc->openDocument();
    }
}

$word7 = new Word7();
$excel7 = new Excel7();
$system = new Widows10System();
$system->verDocs(new AdapterDoc($word7));
echo "<br>";
$system->verDocs(new AdapterDoc($excel7));