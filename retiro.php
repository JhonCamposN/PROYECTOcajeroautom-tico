<?php
require_once 'Cajero.php';

class Retiro extends Cajero {
    public function realizarRetiro($monto) {
        $this->realizarOperacion($monto);
        return "Retiro exitoso. Saldo restante: {$this->consultarSaldo()}";
    }
}
?>
