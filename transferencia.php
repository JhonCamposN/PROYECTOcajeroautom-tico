<?php
require_once 'Cajero.php';

class Transferencia extends Cajero {
    public function realizarTransferencia($monto, $cuentaDestino) {
        $this->realizarOperacion($monto);
        return "Transferencia exitosa a la cuenta $cuentaDestino. Saldo restante: {$this->consultarSaldo()}";
    }
}
?>
