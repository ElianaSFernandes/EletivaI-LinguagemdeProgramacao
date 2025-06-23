<?php
    require_once("cabecalho.php");
?>

    <h2> Consultar Reserva </h2> <!-- EXIBE OS CAMPOS E OS VALORES REFERENTES À RESERVA -->

    <div class="mb-2">
        <p>Data e Hora do Início da Reserva: <strong>Reserva 1</strong></p>
    </div>

    <div class="mb-2">
        <p>Data e Hora Final da Reserva: <strong>Reserva 1</strong></p>
    </div>

    <div class="mb-2">
        <p>Valor da Reserva: <strong>Reserva 1</strong></p>
    </div>

    <div class="mb-2">
        <button type="submit" class="btn btn-danger">Excluir</button>
        <button type="button" class="btn btn-secondary"
                onclick="history.back()">Voltar</button>
    </div>

<?php
    require_once("rodape.php");