<?php
  require_once("cabecalho.php");

function retornaReservas() { //LISTA AS RESERVAS CADASTRADAS
    require("conexao.php");
    try {
        $sql = "SELECT r.*, e.tipo_espaco, v.tipo_evento, l.cpf as cpf_locatario 
                FROM reserva r
                INNER JOIN espaco e ON e.idespaco = r.espaco_idespaco
                INNER JOIN evento v ON v.idevento = r.evento_idevento
                INNER JOIN locatario l ON l.idlocatario = r.locatario_idlocatario"; // COMBINA OS DADOS DESEJADOS PARA A EXIBIÇÃO
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erro ao consultar as reservas: ' . $e->getMessage());
    }
}

  $reservas = retornaReservas(); // RETORNA OS DADOS SOLICITADOS SOBRE A RESERVA 
?>
  
<h2>Reservas</h2>
<a href="nova_reserva.php" class="btn btn-success mb-3">Novo Registro</a>
<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID Reserva</th>  <!-- CAMPOS RELATIVOS À TABELA RESERVA -->
            <th>Data e Hora de Início</th>
            <th>Data e Hora Final</th>
            <th>Valor</th>
            <th>Espaço</th>
            <th>Evento</th>
            <th>Locatário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($reservas as $r):
        ?>
            <tr>
                <td><?= $r['idreserva'] ?></td>
                <td><?= $r['data_hora_inicio'] ?></td>
                <td><?= $r['data_hora_final'] ?></td>
                <td><?= $r['valor_taxa'] ?></td>
                <td><?= $r['tipo_espaco'] ?></td>
                <td><?= $r['tipo_evento'] ?></td>
                <td><?= $r['cpf_locatario'] ?></td>                
                
                <td>
                    <a href="editar_reserva.php?id=<?= $r['idreserva'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_reserva.php?id=<?= $r['idreserva'] ?>" class="btn btn-info">Consultar</a>
                </td>
            </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>


<?php
  require_once("rodape.php");
?>