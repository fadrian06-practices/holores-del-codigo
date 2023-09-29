<?php

namespace IVP\CalcularPrecioTotal\Antes;

class ElementoDelCarrito {
	function __construct(private float $precio, private int $cantidad) {}

	function calcularDescuento(): float {
		static $descuentos = [];

		if ($this->precio <= 0) {
			return 0;
		}

		if ($this->cantidad <= 0) {
			return 0;
		}

		$formato = "$this->precio~$this->cantidad";
		$precioBase = $this->precio * $this->cantidad;
		$descuento = 0;

		if (key_exists($formato, $descuentos)) {
			$descuento = $descuentos[$formato];
		} elseif ($precioBase > 1000) {
			$descuento = $precioBase * .95;
		} else {
			$descuento = $precioBase * .98;
		}

		$descuentos["$this->precio~$this->cantidad"] = $descuento;
		return $descuento;
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
