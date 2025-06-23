<?php

    require_once("cabecalho.php");

    function consultaUsuario($id){ // EXIBE USUÁRIO CADASTRADO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM usuario WHERE idusuario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$usuario){
                die("Erro ao consultar o registro!");
            } else{
                return $usuario;
            }
        } catch(Exception $e){
            die("Erro ao consultar o usuário: " . $e->getMessage());
        }
    }

    function excluirUsuario($id){ // EFETUA A EXCLUSÃO DE UM USUÁRIO
        require("conexao.php");
        try{
            $sql = "DELETE FROM usuario WHERE idusuario = ?"; // DELETA O USUÁRIO DO BANCO DE DADOS
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id])){
                header('location: usuarios.php?exclusao=true');
            } else {
                header('location: usuarios.php?exclusao=false');
            }
        } catch (Exception $e){
            die("Erro ao excluir o usuario: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $idusuario = $_POST['idusuario'];
        excluirUsuario($id);
    } else {
        $usuario = consultaUsuario($_GET['id']);
    }

?>

<h2>Consultar Usuários</h2>

<form method="post">

    <input type="hidden" name="idusuario" value="<?= $usuario['idusuario'] ?>" >
                        
    <div class="mb-3">
        <p>Nome do Usuário: <b> <?= $usuario['nome'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Email do Usuário: <b> <?= $usuario['email'] ?> </b> </p>
    </div>

    <div class="mb-3">
        <p>Senha do Usuário: <b> <?= $usuario['senha'] ?> </b> </p>
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