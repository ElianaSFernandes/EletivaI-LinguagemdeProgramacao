<?php
  require_once("cabecalho.php");

  function retornaUsuarios(){ // EXIBE USUÁRIOS CADASTRADOS
    require("conexao.php");
    try{
      $sql = "SELECT * from usuario";
      $stmt = $pdo->query($sql);
      return $stmt->fetchAll();
    } catch (Exception $u){
      die("Erro ao consultar os usuários: ". $u->getMessage());
    }
  }

  $usuarios = retornaUsuarios();

?>

<h2>Usuários</h2>
<a href="novo_usuario.php" class="btn btn-success mb-3">Novo Registro</a>

<?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == true){
      echo '<p class="text-success">Registro salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == false){
      echo '<p class="text-danger">Erro ao inserir o registro!</p>';
    }
    if (isset($_GET['edicao']) && $_GET['edicao'] == true){
      echo '<p class="text-success">Registro alterado com sucesso!</p>';
    } elseif (isset($_GET['edicao']) && $_GET['edicao'] == false){
      echo '<p class="text-danger">Erro ao alterar o registro!</p>';
    }
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == true){
      echo '<p class="text-success">Registro excluído com sucesso!</p>';
    } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == false){
      echo '<p class="text-danger">Erro ao excluir o registro!</p>';
    }
?>

<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID Usuário</th>
            <th>Nome do Usuário</th>
            <th>Email do Usuário</th>
            <th>Senha do Usuário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
          foreach($usuarios as $u):
        ?>
            <tr>
                <td><?= $u['idusuario'] ?></td>
                <td><?= $u['nome'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['senha'] ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?= $u['idusuario'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_usuario.php?id=<?= $u['idusuario'] ?>" class="btn btn-info">Consultar</a>
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