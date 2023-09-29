<?php

namespace ReducirLongitud\Antes;

class Cuenta {
	function __construct(private string $nombre) {
	}

	function imprimirDeuda(): void {
		// Imprimir encabezado
		$encabezado = 'Estado de cuenta';
		$cantidadAsteriscos = strlen($encabezado);
		$asteriscos = str_pad('', $cantidadAsteriscos, '*');
		echo "$asteriscos\n";
		echo "$encabezado\n";
		echo "$asteriscos\n";

		// Lógica para obtener el monto pendiente
		$montoPendiente = rand(1, 1000); // Ejemplo de valor estático, puedes adaptarlo a tus necesidades

		// Imprimir detalles
		echo "Nombre: $this->nombre\n";
		echo "Monto: $montoPendiente\n";
	}
}

$cuenta = new Cuenta('Franyer');
$cuenta->imprimirDeuda();
