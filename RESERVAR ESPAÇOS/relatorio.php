<?php
  session_start();
  if(!$_SESSION['acesso']){
    header("location: index.php?mensagem=acesso_negado");
  }

    function retornaReservas() { // RETORNA OS DADOS DA RESERVA, CRUZANDO DADOS DE VÁRIAS TABELAS
    require("conexao.php");
    try {
        $sql = "SELECT r.*, e.tipo_espaco, v.tipo_evento, l.cpf as cpf_locatario
                FROM reserva r
                INNER JOIN espaco e ON e.idespaco = r.espaco_idespaco
                INNER JOIN evento v ON v.idevento = r.evento_idevento
                INNER JOIN locatario l ON l.idlocatario = r.locatario_idlocatario";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erro ao consultar as reservas: ' . $e->getMessage());
    }
}

$reservas = retornaReservas();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Reservas</title>
    <style>
        /* Estilo normal (tela) */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 20px;
        }
        .no-print {
            display: block;
        }
        .print-button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;            
            cursor: pointer;
            border-radius: 4px;
        }

        /* Ajusta o estilo de impressão */  /* SERVE PARA NÃO IMPRIMIR A CAIXA VERDE DE IMPRESSÃO*/
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                font-size: 12px;
                padding: 0;
            }
            .tabela th {
                background-color: #f0f0f0 !important;
                -webkit-print-color-adjust: exact;
            }
        }

        /* Seu CSS original */
        .titulo { text-align: center; font-size: 18px; font-weight: bold; }
        .tabela { width: 100%; border-collapse: collapse; 15px; }
        .tabela th, .tabela td { border: 1px solid #000; padding: 6px 10px; text-align: left; }
        .tabela th { background-color: #f0f0f0; }
    </style>
</head>
<body>

    <!-- Botão para
    impressão (não aparece no PDF) WINDOW.PRINT QUE FAZ APARECER A JANELA DE IMPRESSÃO--> 
    <button class="print-button no-print" onclick="window.print()">Imprimir / Salvar como PDF</button>

    <div class="titulo">Relatório de Reservas</div>
    <div class="row">
        <div class="col">Dados: <?php echo date('d/m/Y'); ?></div>
    </div>

    <table class="tabela">
        <thead>
            <tr>
                <th>ID Reserva</th>
                <th>Data e Hora de Início</th>
                <th>Data e Hora Final</th>
                <th>Valor</th>
                <th>Espaço</th>
                <th>Evento</th>
                <th>Locatário</th>
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
                <td>R$<?= $r['valor_taxa'] ?></td>
                <td><?= $r['tipo_espaco'] ?></td>
                <td><?= $r['tipo_evento'] ?></td>
                <td><?= $r['cpf_locatario'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>

    <script>
        // Opcional: Configuração para melhor experiência de impressão
        function beforePrint() {
            console.log("Preparando para impressão...");
        }
        function afterPrint() {
            console.log("Impressão concluída");
        }
        window.addEventListener('beforeprint', beforePrint);
        window.addEventListener('pós-impressão', pós-impressão);
    </script>
</body>
</html>