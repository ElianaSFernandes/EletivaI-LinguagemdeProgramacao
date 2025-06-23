<?php

    require_once("cabecalho.php");

    function inserirLocatario($cpf, $nome, $endereco, $telefone){ //FUNÇÃO PARA INSERIR UM NOVO LOCATÁRIO
        require("conexao.php");
        try{
            $sql = "INSERT INTO locatario (cpf, nome, endereco, telefone) VALUES (?, ?, ?, ?)"; // PERMITE O CADASTRO DE UM NOVO LOCATÁRIO NO BANCO DE DADOS
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$cpf, $nome, $endereco, $telefone])){
                header('location: locatarios.php?cadastro=true');
            } else {
                header('location: locatarios.php?cadastro=false');
            }
        } catch (Exception $e){
            die("Erro ao inserir o locatário: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        inserirLocatario($cpf, $nome, $endereco, $telefone);
    }//

?>

<h2>Novo Locatário</h2>

<form method="post">
                        
    <div class="mb-3">
        <label for="cpf" class="form-label">Informe o CPF do Locatário</label>
        <input type="text" id="cpf" name="cpf" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Nome do Locatário</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="endereco" class="form-label">Informe o Endereço do Locatário</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o Telefone do Locatário</label>
        <input type="text" id="telefone" name="telefone" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>