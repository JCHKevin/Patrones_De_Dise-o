<?php
interface StrategyMensajes
{
    public function mostrar(string $mensaje): string;
}

#clases basess
class SalidaConsola implements StrategyMensajes
{
    public function mostrar(string $mensaje): string
    {
        return "[Consola] " . $mensaje;
    }
}

class SalidaJSON implements StrategyMensajes
{
    public function mostrar(string $mensaje): string
    {
        return json_encode(["mensaje" => $mensaje], JSON_UNESCAPED_UNICODE);
    }
}


class SalidaTXT implements StrategyMensajes
{
    public function mostrar(string $mensaje): string
    {
        $archivo = "salida.txt";
        file_put_contents($archivo, $mensaje . PHP_EOL, FILE_APPEND);
        return "Mensaje guardado en archivo: $archivo";
    }
}

class ProcesadorMensajes
{
    private StrategyMensajes $estrategia;

    public function setSalida(StrategyMensajes $estrategia)
    {
        $this->estrategia = $estrategia;
    }

    public function procesar(string $mensaje): string
    {
        return $this->estrategia->mostrar($mensaje);
    }
}


$mensaje = "Bienvenido al sistema de notificaciones";

//mostrar rn consola
$procesador = new ProcesadorMensajes();
$procesador->setSalida(new SalidaConsola());
echo $procesador->procesar($mensaje);

echo "<br>";

//json
$procesador->setSalida(new SalidaJSON());
echo $procesador->procesar($mensaje);

echo "<br>";

//en txt
$procesador->setSalida(new SalidaTXT());
echo $procesador->procesar($mensaje);
