<?php

namespace IVP\CalcularPrecioTotal\Antes;

class ElementoDelCarrito {
	/** @var array<string, ?float> */
	private static array $descuentos = [];

	function __construct(private float $precio, private int $cantidad) {
	}

	# ================================================================= #
	# =           Técnica aplicada: Replace Temp with Query           = #
	# ================================================================= #
	function calcularDescuento(): float {
		if ($this->precio <= 0 || $this->cantidad <= 0) {
			return 0;
		}

		$descuento = $this->descuentoFrecuente();

		if ($descuento !== .0) {
			return $descuento;
		}

		if ($this->precioBase() > 1000) {
			$descuento = $this->precioBase() * .95;
		} else {
			$descuento = $this->precioBase() * .98;
		}

		$this->guardarDescuento($descuento);
		return $descuento;
	}

	function precioBase(): float {
		return $this->precio * $this->cantidad;
	}

	private function guardarDescuento(float $descuento): void {
		self::$descuentos[$this->formatoCache()] = $descuento;
	}

	private function descuentoFrecuente(): float {
		return @self::$descuentos[$this->formatoCache()] ?? 0;
	}

	private function formatoCache(): string {
		return "$this->precio~$this->cantidad";
	}
}

$precio = 4.72;
$cantidad = 2;
$elementoDelCarrito = new ElementoDelCarrito($precio, $cantidad);

echo <<<LOG
Precio: $precio
Cantidad: $cantidad
Descuento: {$elementoDelCarrito->calcularDescuento()}
LOG;
