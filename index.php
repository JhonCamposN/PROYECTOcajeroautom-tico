<?php
// Incluir las clases Retiro y Transferencia
require_once 'Retiro.php';
require_once 'Transferencia.php';

// Verificar si se enviaron datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el saldo inicial de la entrada del usuario
    $saldoInicial = isset($_POST['saldoInicial']) ? floatval($_POST['saldoInicial']) : 0;

    // Crear una instancia de Retiro con el saldo inicial
    $retiroCajero = new Retiro($saldoInicial);

    // Obtener el monto de retiro de la entrada del usuario
    $montoRetiro = isset($_POST['montoRetiro']) ? floatval($_POST['montoRetiro']) : 0;

    // Verificar si el saldo es suficiente antes de realizar el retiro
    if ($montoRetiro > $saldoInicial) {
        $resultadoRetiro = "Error de operación, saldo insuficiente";
    } else {
        // Realizar un retiro
        $resultadoRetiro = $retiroCajero->realizarRetiro($montoRetiro);
    }

    // Crear una instancia de Transferencia con el saldo inicial
    $transferenciaCajero = new Transferencia($saldoInicial);

    // Obtener el monto de transferencia y la cuenta de destino de la entrada del usuario
    $montoTransferencia = isset($_POST['montoTransferencia']) ? floatval($_POST['montoTransferencia']) : 0;
    $cuentaDestino = isset($_POST['cuentaDestino']) ? $_POST['cuentaDestino'] : '';

    // Verificar si el saldo es suficiente antes de realizar la transferencia
    if ($montoTransferencia > $saldoInicial) {
        $resultadoTransferencia = "Error de operación, saldo insuficiente";
    } else {
        // Realizar una transferencia
        $resultadoTransferencia = $transferenciaCajero->realizarTransferencia($montoTransferencia, $cuentaDestino);
    }
}
?>

<!-- Agrego una estrctura interactiva -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto: Cajero Automático</title>
</head>
<body>
    <h1>Cajero Automático</h1>
    
    <!-- Formulario para ingresar datos -->
    <form method="post">
        <label for="saldoInicial">Ingrese el saldo inicial:</label>
        <input type="text" name="saldoInicial" id="saldoInicial" required>
        <br>

        <label for="montoRetiro">Ingrese el monto a retirar:</label>
        <input type="text" name="montoRetiro" id="montoRetiro" required>
        <br>

        <label for="montoTransferencia">Ingrese el monto a transferir:</label>
        <input type="text" name="montoTransferencia" id="montoTransferencia" required>
        <br>

        <label for="cuentaDestino">Ingrese la cuenta de destino para la transferencia:</label>
        <input type="text" name="cuentaDestino" id="cuentaDestino" required>
        <br>

        <button type="Realizar Operación">Realizar Operaciones</button>
    </form>

    <!-- Mostrar resultados si están disponibles -->
    <?php
    if (isset($resultadoRetiro)) {
        echo "<p>$resultadoRetiro</p>";
    }

    if (isset($resultadoTransferencia)) {
        echo "<p>$resultadoTransferencia</p>";
    }
    ?>
</body>
</html>