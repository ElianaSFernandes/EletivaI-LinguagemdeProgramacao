<?php

    require_once("cabecalho.php");

    function consultaLocatario($id){ //FUNÇÃO QUE PERMITE A CONSULTA E EXIBIÇÃO DOS DADOS DE UM LOCATÁRIO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM locatario WHERE idlocatario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $locatario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$locatario){
                die("Erro ao consultar o registro!");
            } else{
                return $locatario;
            }
        } catch(Exception $e){
            die("Erro ao consultar o locatário: " . $e->getMessage());
        }
    }

    function alterarLocatario($cpf, $nome, $endereco, $telefone, $idlocatario){ //FUNÇÃO PARA ALTERAR DADOS DE UM LOCATÁRIO
        require("conexao.php");
        try{
            $sql = "UPDATE locatario SET cpf = ?, nome = ?, endereco = ?, telefone = ? WHERE idlocatario = ?"; // FAZ ATUALIZAÇÃO NO BANCO DE DADOS
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$cpf, $nome, $endereco, $telefone, $idlocatario])){
                header('location: locatarios.php?edicao=true');
            } else {
                header('location: locatarios.php?edicao=false');
            }
        } catch (Exception $e){
            die("Erro ao alterar o locatário: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $idlocatario = $_POST['idlocatario'];
        alterarLocatario($cpf, $nome, $endereco, $telefone, $idlocatario);
    } else {
        $locatario = consultaLocatario($_GET['id']);
    }
//
?>

<h2>Alterar Locatário</h2>

<form method="post">

    <input type="hidden" name="idlocatario" value="<?= $locatario['idlocatario'] ?>" >
                        
    <div class="mb-3">
        <label for="cpf" class="form-label">Informe o CPF do Locatário</label>
        <input value="<?= $locatario["cpf"] ?>" type="text" id="cpf" name="cpf" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Nome do Locatário</label>
        <input value="<?= $locatario["nome"] ?>" type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="endereco" class="form-label">Informe o Endereco do Locatário</label>
        <input value="<?= $locatario["endereco"] ?>" type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Informe o Telefone do Locatário</label>
        <input value="<?= $locatario['telefone'] ?>" type="text" id="telefone" name="telefone" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>