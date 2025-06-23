<?php
    require_once ('cabecalho.php');
    
    function retornaReservas() { //retorna dados da reserva para gerar gráfico
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

    <h1> Dashboard </h1>

    <a href="relatorio.php" target="_blank"> Relatório de Reservas </a>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>
    <script>
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {
            var data = google.visualization.arrayToDataTable([
                ['Espaço/Evento', 'Valor'], // EXIBE VALORES DAS RESERVAS AGRUPANDO ESPAÇO E EVENTO
                <?php
                    foreach($reservas as $r){
                        $nome = $r['tipo_espaco'] .' - '.$r['tipo_evento'];
                        $preco = $r['valor_taxa'];
                        echo "['$nome', $preco],";
                    }
                ?>
            ]);

            var options = {
                title: 'Preço dos produtos',
                chartArea: {width: '50%'},
                hAxis: {
                title: 'Preço',
                minValue: 0
                },
                vAxis: {
                title: 'Nome do Produto'
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div')); // BARCHART É USADO PARA MOSTRAR OS VALORES GRAFICAMENTE

            chart.draw(data, options);
        }
    </script>

    <?php
        require_once ('rodape.php');



