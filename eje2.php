<?php

#protocolo
interface IArchivo
{
    public function openDocument();
}

#interfaz para los archivos que sean de la version 7
interface IDocuments7
{
    public function open();
}

#cosntruir las clases que vas adaptar
class Word7 implements IDocuments7
{
    public function open()
    {
        echo "Abriendo documento word 7";
    }
}

class Excel7 implements IDocuments7
{
    public function open()
    {
        echo "Abriendo documento excel 7";
    }
}

class Word10 implements IArchivo
{
    public function openDocument()
    {
        echo "Abriendo un word 10";
    }
}

#adaptador general para documentos de la version7
class AdapterDoc implements IArchivo
{

    private IDocuments7 $documento;

    public function __construct(IDocuments7 $doc)
    {
        $this->documento = $doc;
    }

    public function openDocument()
    {
        echo "Adaptando documentos con la version 7 a la 10<br>";
        $this->documento->open();
    }
}


#clase general que recibe documentos
class Windows10System
{
    public function verDocuments(IArchivo $documento)
    {
        return $documento->openDocument();
    }
}

$word7 = new Word7();
$excel7 = new Excel7();

$word10 = new Word10();

$system = new Windows10System();
$system->verDocuments(new AdapterDoc($word7));

echo "<br>";

$system->verDocuments(new AdapterDoc($excel7));

echo "<br>";

$system->verDocuments($word10);


// class AdapterDocExcel7 implements IArchivo{

//     private Excel7 $documento;

//     public function __construct(Excel7 $doc)
//     {
//         $this->documento = $doc;
//     }

//     public function openDocument()
//     {
//         echo "Adaptando documentos con la version 7 a la 10";
//         $this->documento->open();
//     }
// }}