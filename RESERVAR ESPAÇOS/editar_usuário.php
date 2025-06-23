<?php

    require_once("cabecalho.php");

    function consultaUsuario($id){ // CARREGA E EXIBE OS DADOS DO USUÁRIO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM usuario WHERE idusuario = ?"; // SELECIONA O USUÁRIO PELO ID
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

    function alterarUsuario($nome, $email, $senha, $idusuario){ // FAZ ALTERAÇÕES NO CADASTROO DO USUÁRIO
        require("conexao.php");
        try{
            $sql = "UPDATE usuario SET nome = ?, email = ?, senha = ? WHERE idusuario = ?"; // FAZ A ALTERAÇÃO DOS DADOS NO BANCO DE DADOS
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$nome, $email, $senha, $idusuario])){
                header('location: usuarios.php?edicao=true');
            } else {
                header('location: usuarios.php?edicao=false');
            }
        } catch (Exception $e){
            die("Erro ao alterar o usuário: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $idusuario = $_POST['idusuario'];
        alterarUsuario($nome, $email, $senha, $idusuario);
    } else {
        $usuario = consultaUsuario($_GET['id']);
    }

?>

<h2>Alterar Usuários</h2>

<form method="post">

    <input type="hidden" name="$idusuario" value="<?= $usuario['$idusuario'] ?>" >
                        
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Nome do Usuário</label>
        <input value="<?= $usuario["nome"] ?>" type="text" id="nome" name="nome" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Informe o Email do Usuário</label>
        <input value="<?= $usuario["email"] ?>" type="text" id="email" name="email" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="senha" class="form-label">Informe a Senha do Usuário</label>
        <input value="<?= $usuario["senha"] ?>" type="password" id="senha" name="senha" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>