<?php
    require_once("cabecalho.php");

        function retornaEventos(){
        require("conexao.php");
        try{
            $sql = "SELECT * from evento";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $v){
            die("Erro ao consultar os eventos: ". $v->getMessage());
        }
    }

    $eventos = retornaEventos();

?>

<h2>Eventos</h2>
<a href="novo_evento.php" class="btn btn-success mb-3">Novo Registro</a>

<?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'true'){ // verifica se o parâmetro cadastro está presente na URL e verifica se o valor passado é "true"
      echo '<p class="text-success">Registro salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == 'false'){
      echo '<p class="text-danger">Erro ao inserir o registro!</p>';
    }
    if (isset($_GET['edicao']) && $_GET['edicao'] == 'true'){ // verifica se o parâmetro edição está presente na URL e verifica se o valor passado é "true"
      echo '<p class="text-success">Registro alterado com sucesso!</p>';
    } elseif (isset($_GET['edicao']) && $_GET['edicao'] == 'false'){
      echo '<p class="text-danger">Erro ao alterar o registro!</p>';
    }
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == 'true'){ // // verifica se o parâmetro exclusão está presente na URL e verifica se o valor passado é "true"
      echo '<p class="text-success">Registro excluído com sucesso!</p>';
    } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == 'false'){
      echo '<p class="text-danger">Erro ao excluir o registro!</p>';
    }
?>

<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID Evento</th>
            <th>Tipo do Evento</th>            
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
          foreach($eventos as $v):
        ?>
            <tr>
                <td><?= $v['idevento'] ?></td>
                <td><?= $v['tipo_evento'] ?></td>             
                <td>
                    <a href="editar_evento.php?id=<?= $v['idevento'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_evento.php?id=<?= $v['idevento'] ?>" class="btn btn-info">Consultar</a>
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