<?php

namespace ReducirLongitud\Despues;

class Cuenta {
	function __construct(private string $nombre) {
	}

	# ======================================================== #
	# =           Técnica aplicada: Extract Method           = #
	# ======================================================== #
	function imprimirDeuda(): void {
		$this->imprimirEncabezado();
		$this->imprimirDetalles($this->obtenerMontoPendiente());
	}

	function obtenerMontoPendiente(): float {
		// Lógica para obtener el monto pendiente

		// Ejemplo de valor estático, puedes adaptarlo a tus necesidades
		$montoPendiente = rand(1, 1000);

		return $montoPendiente;
	}

	private function imprimirDetalles(float $montoPendiente): void {
		echo "Nombre: $this->nombre\n";
		echo "Monto: $montoPendiente\n";
	}

	private function imprimirEncabezado(): void {
		$encabezado = 'Estado de cuenta';
		$cantidadAsteriscos = strlen($encabezado);
		$asteriscos = str_pad('', $cantidadAsteriscos, '*');
		echo "$asteriscos\n";
		echo "$encabezado\n";
		echo "$asteriscos\n";
	}
}

$cuenta = new Cuenta('Franyer');
$cuenta->imprimirDeuda();
