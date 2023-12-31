<?php
class Cajero {
    protected $saldo;

    public function __construct($saldo) {
        $this->saldo = $saldo;
    }

    public function consultarSaldo() {
        return $this->saldo;
    }

    public function realizarOperacion($monto) {
        $this->saldo -= $monto;
    }
}
?>
