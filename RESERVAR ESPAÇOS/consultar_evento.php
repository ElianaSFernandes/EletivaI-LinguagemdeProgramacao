<?php

    require_once("cabecalho.php");

    function consultaEvento($id){ //função para consultar evento
        require("conexao.php");
        try{
            $sql = "SELECT * FROM evento WHERE idevento = ?"; //seleciona todas as colunas da tabela evento, onde o campo idevento for igual a um valor específico”.
            $stmt = $pdo->prepare($sql); // prepara a consulta SQL para execução. Isso permite que dados sejam inseridos de forma segura no lugar do ?
            $stmt->execute([$id]);// Aqui, o valor da variável $id é passado para substituir o ? na query.
            $evento = $stmt->fetch(PDO::FETCH_ASSOC); // Esse método retorna o resultado da consulta como um array associativo, ou seja, um array onde as chaves são os nomes das colunas da tabela.
            if (!$evento){
                die("Erro ao consultar o registro!");
            } else{
                return $evento;
            }
        } catch(Exception $e){
            die("Erro ao consultar o evento: " . $e->getMessage());
        }
    }

    function excluirEvento($id){ //função para excluir evento
        require("conexao.php");
        try{
            $sql = "DELETE FROM evento WHERE idevento = ?"; //DELETA O EVENTO NO BANCO DE DADOS
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id])){
                header('location: eventos.php?exclusao=true');
            } else {
                header('location: eventos.php?exclusao=false');
            }
        } catch (Exception $e){
           // die("Erro ao excluir o evento: ".$e->getMessage());
            header('location: eventos.php?exclusao=false');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $idevento = $_POST['idevento'];
        excluirEvento($idevento);
    } else {
        $evento = consultaEvento($_GET['id']);
    }

?>

<h2>Consultar Eventos</h2>  <!-- CAMPOS DA TABELA EVENTO -->

<form method="post">

    <input type="hidden" name="idevento" value="<?= $evento['idevento'] ?>" >
                        
    <div class="mb-3">
        <p>Tipo do Evento: <b> <?= $evento['tipo_evento'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p class="text-danger">Deseja excluir esse registro</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="eventos.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>


<?php 
    require_once("rodape.php");

?>