<?php

    require_once("cabecalho.php");

    function consultaLocatario($id){
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

    function excluirLocatario($id){ // FUNÇÃO QUE PERMITE A EXCLUSÃO DE LOCATÁRIO
        require("conexao.php");
        try{
            $sql = "DELETE FROM locatario WHERE idlocatario = ?"; // BUSCA LOCATÁRIO POR ID DESEJADO
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id])){
                header('location: locatarios.php?exclusao=true');
            } else {
                header('location: locatarios.php?exclusao=false');
            }
        } catch (Exception $e){
            // die("Erro ao excluir o locatário: ".$e->getMessage());
            header('location: locatarios.php?exclusao=false');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $idlocatario = $_POST['idlocatario'];
        excluirLocatario($id);
    } else {
        $locatario = consultaLocatario($_GET['id']);
    }
//
?>

<h2>Consultar Locatários</h2> 

<form method="post">

    <input type="hidden" name="idlocatario" value="<?= $locatario['idlocatario'] ?>" >
                        
    <div class="mb-3">
        <p>CPF do Locatário: <b> <?= $locatario['cpf'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Nome do Locatário: <b> <?= $locatario['nome'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Endereço do Locatário: <b> <?= $locatario['endereco'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Telefone do Locatário: <b> <?= $locatario['telefone'] ?> </b> </p>
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