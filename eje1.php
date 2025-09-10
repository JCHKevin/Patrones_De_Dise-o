<?php

interface Personaje
{
    public function velocidad();
    public function ataque();
}

#clases concretass
class Esqueleto implements Personaje
{
    public function velocidad()
    {
        echo "El esqueleto corre rapido";
    }

    public function ataque()
    {
        echo "El esqueleto ataca con un hueso";
    }
}

class Zombie implements Personaje
{
    public function velocidad()
    {
        echo "El zombie corre lento";
    }

    public function ataque()
    {
        echo "El zombi ataca con una bomba y cuchillo";
    }
}

class PersonajeFactory
{

    public static function crearPersonaje($nivel): Personaje
    {
        if ($nivel == "facil") {
            return new Esqueleto();
        } else if ($nivel == "dificil") {
            return new Zombie();
        } else {
            throw new Exception("Escoge un grado de dificultad");
        }
    }
}

$esqueleto = PersonajeFactory::crearPersonaje('facil');
$esqueleto->velocidad();
