<?php

interface IPersonaje
{
    public function armas();
}

#clases bases
class Thor implements IPersonaje
{

    public function armas()
    {
        return "Thor tiene su martillo";
    }
}

class Iroman implements IPersonaje
{

    public function armas()
    {
        return "Iroman tiene su traje";
    }
}


class PersonajeDecorator implements IPersonaje
{
    protected IPersonaje $personaje;

    public function __construct(IPersonaje $personaje)
    {
        $this->personaje = $personaje;
    }

    public function armas()
    {
        return $this->personaje->armas();
    }
}

#decoradoress
class HachaDecorator extends PersonajeDecorator
{

    public function armas()
    {
        return $this->personaje->armas() . ", tambien lleva una hacha";
    }
}

#nieto de la clase base decoradora
class HachaHija extends HachaDecorator
{

    public function armas()
    {
        return $this->personaje->armas() . ", la hacha tiene un super poder";
    }
}

class AnillosDecorator extends PersonajeDecorator
{

    public function armas()
    {
        return $this->personaje->armas() . ", tambien lleva los anillos de thanos";
    }
}

echo "THOR<br>";
$thor = new Thor();
echo $thor->armas();
echo "<br>";

$thor = new HachaDecorator($thor);
echo $thor->armas();

echo "<br>";
$thor = new AnillosDecorator($thor);
echo $thor->armas();
echo "<br>";

echo "<br>";
$thor = new HachaHija($thor);
echo $thor->armas();
