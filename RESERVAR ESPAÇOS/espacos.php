<?php
    require_once("cabecalho.php");

    function retornaEspacos(){
    require("conexao.php");
    try{
        $sql = "SELECT * from espaco"; // Cria uma string SQL para buscar todos os registros da tabela 'espaco'
        $stmt = $pdo->query($sql); // Executa a consulta no banco usando o objeto PDO
        return $stmt->fetchAll(); // Retorna todos os resultados da consulta em forma de array
    } catch (Exception $e){
        die("Erro ao consultar os espaços: ". $e->getMessage()); // Se ocorrer erro, exibe a mensagem e encerra o script
    }
    }

    $espacos = retornaEspacos();

?>

<h2>Espaços</h2>
<a href="novo_espaco.php" class="btn btn-success mb-3">Novo Registro</a>

<?php
    if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'true'){  // NESTE TRECHO É FEITO UM NOVO CADASTRO DE ESPAÇO
      echo '<p class="text-success">Registro salvo com sucesso!</p>';
    } elseif (isset($_GET['cadastro']) && $_GET['cadastro'] == 'false'){
      echo '<p class="text-danger">Erro ao inserir o registro!</p>';
    }
    if (isset($_GET['edicao']) && $_GET['edicao'] == 'true'){ // NESTE TRECHO É FEITA A EDIÇÃO DE ALGUM OU TODOS OS CAMPOS DO ESPAÇO
      echo '<p class="text-success">Registro alterado com sucesso!</p>';
    } elseif (isset($_GET['edicao']) && $_GET['edicao'] == 'false'){
      echo '<p class="text-danger">Erro ao alterar o registro!</p>';
    }
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == 'true'){ // AQUI É FEITA A EXCLUSÃO DE UM ESPAÇO SELECIONADO
      echo '<p class="text-success">Registro excluído com sucesso!</p>';
    } elseif (isset($_GET['exclusao']) && $_GET['exclusao'] == 'false'){
      echo '<p class="text-danger">Erro ao excluir o registro!</p>';
    }
?>

<table class="table table-hover table-striped" id="tabela">
    <thead>
        <tr>
            <th>ID Espaço</th>   <!-- AQUI ESTÃO TODOS OS CAMPOS DA TABELA ESPAÇO  -->
            <th>Tipo do Espaço</th>
            <th>Tamanho do Espaço</th>
            <th>Capacidade do Espaço</th>
            <th>Endereço do Espaço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
          foreach($espacos as $e):
        ?>
            <tr>
                <td><?= $e['idespaco'] ?></td>
                <td><?= $e['tipo_espaco'] ?></td>
                <td><?= $e['tamanho'] ?></td>
                <td><?= $e['capacidade'] ?></td>
                <td><?= $e['endereco'] ?></td>
                <td>
                    <a href="editar_espaco.php?id=<?= $e['idespaco'] ?>" class="btn btn-warning">Editar</a>
                    <a href="consultar_espaco.php?id=<?= $e['idespaco'] ?>" class="btn btn-info">Consultar</a>
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