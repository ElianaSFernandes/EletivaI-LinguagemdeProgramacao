<?php
  require_once("cabecalho.php");

  function retornaLocatarios(){ // FUNÇÃO PARA PESQUISA DE LOCATÁRIOS
    require("conexao.php");//
    try{
      $sql = "SELECT * from locatario"; // SELECIONA E LISTA OS LOCATÁRIOS COM CPF, NOME, ENDEREÇO E TELEFONE
      $stmt = $pdo->query($sql);
      return $stmt->fetchAll();
    } catch (Exception $l){
      die("Erro ao consultar os locatários: ". $l->getMessage());
    }
  }

  $locatarios = retornaLocatarios();

?>

<h2>Locatários</h2>
<a href="novo_locatario.php" class="btn btn-success mb-3">Novo Registro</a>

<?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'true'){
      echo '<p class="text-success">Registro salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == 'false'){
      echo '<p class="text-danger">Erro ao inserir o registro!</p>';
    }
    if (isset($_GET['edicao']) && $_GET['edicao'] == 'true'){
      echo '<p class="text-success">Registro alterado com sucesso!</p>';
    } elseif (isset($_GET['edicao']) && $_GET['edicao'] == 'false'){
      echo '<p class="text-danger">Erro ao alterar o registro!</p>';
    }
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == 'true'){
      echo '<p class="text-success">Registro excluído com sucesso!</p>';
    } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == 'false'){
      echo '<p class="text-danger">Erro ao excluir o registro!</p>';
    }
?>

<table class="table table-hover table-striped" id="tabela"> <!-- CAMPOS DA TABELA LOCATÁRIOS -->
    <thead>
        <tr>
            <th>ID Locatário</th>
            <th>CPF do Locatário</th>
            <th>Nome do Locatário</th>
            <th>Endereço do Locatário</th>
            <th>Telefone do Locatário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
          foreach($locatarios as $l):
        ?>
            <tr>
                <td><?= $l['idlocatario'] ?></td>
                <td><?= $l['cpf'] ?></td>
                <td><?= $l['nome'] ?></td>
                <td><?= $l['endereco'] ?></td>
                <td><?= $l['telefone'] ?></td>
                <td>
                    <a href="editar_locatario.php?id=<?= $l['idlocatario'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_locatario.php?id=<?= $l['idlocatario'] ?>" class="btn btn-info">Consultar</a>
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