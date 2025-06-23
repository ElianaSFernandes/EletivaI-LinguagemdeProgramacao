<?php

    require_once("cabecalho.php");

    function consultaEspaco($id){ // FUNÇÃO PARA CONSULTAR ESPAÇO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM espaco WHERE idespaco = ?"; //seleciona todas as colunas da tabela espaco, onde o campo idespaco for igual a um valor específico”.
            $stmt = $pdo->prepare($sql); // prepara a consulta SQL para execução. Isso permite que dados sejam inseridos de forma segura no lugar do ?
            $stmt->execute([$id]); // Aqui, o valor da variável $id é passado para substituir o ? na query.
            $espaco = $stmt->fetch(PDO::FETCH_ASSOC); // Esse método retorna o resultado da consulta como um array associativo, ou seja, um array onde as chaves são os nomes das colunas da tabela.
            if (!$espaco){
                die("Erro ao consultar o registro!");
            } else{
                return $espaco;
            }
        } catch(Exception $e){
            die("Erro ao consultar o espaco: " . $e->getMessage());
        }
    }

    function excluirEspaco($id){ // FUNÇÃO PARA EXCLUIR ESPAÇO
        require("conexao.php");  
        try{
            $sql = "DELETE FROM espaco WHERE idespaco = ?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id])){
                header('location: espacos.php?exclusao=true');
            } else {
                header('location: espacos.php?exclusao=false');
            }
        } catch (Exception $e){
            //die("Erro ao excluir o espaco: ".$e->getMessage());
            header('location: espacos.php?exclusao=false');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $idespaco = $_POST['idespaco'];
        excluirEspaco($idespaco);
    } else {
        $espaco = consultaEspaco($_GET['id']);
    }

?>

<h2>Consultar Espaços</h2> <!-- MOSTRA OS CAMPOS EXISTENTES NA TABELA ESPAÇO -->

<form method="post">

    <input type="hidden" name="idespaco" value="<?= $espaco['idespaco'] ?>" >
                        
    <div class="mb-3">
        <p>Tipo do Espaco: <b> <?= $espaco['tipo_espaco'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Tamanho do Espaco: <b> <?= $espaco['tamanho'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Capacidade do Espaco: <b> <?= $espaco['capacidade'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Endereço do Espaco: <b> <?= $espaco['endereco'] ?> </b> </p>
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