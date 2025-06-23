<?php

    require_once("cabecalho.php");

    function consultaEpaco($id){ // NESTA FUNÇÃO CONSULTAMOS O ESPAÇO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM espaco WHERE idespaco = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $espaco = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$espaco){
                die("Erro ao consultar o registro!");
            } else{
                return $espaco;
            }
        } catch(Exception $e){
            die("Erro ao consultar o espaço: " . $e->getMessage());
        }
    }

    function alterarEspaco($tipo_espaco, $tamanho, $capacidade, $endereco, $idespaco){ // COM ESTA FUNÇÃO PODEMOS ALTERAR OS DADOS DE UM DETERMINADO ESPAÇO
        require("conexao.php");
        try{
            $sql = "UPDATE espaco SET tipo_espaco = ?, tamanho = ?, capacidade = ?, endereco = ? WHERE idespaco = ?"; //AQUI É FEITA A ATUALIZAÇÃO DOS DADOS DO ESPAÇO
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$tipo_espaco, $tamanho, $capacidade, $endereco, $idespaco])){
                header('location: espacos.php?edicao=true');
            } else {
                header('location: espacos.php?edicao=false');
            }
        } catch (Exception $e){
            die("Erro ao alterar o espaço: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $tipo_espaco = $_POST['tipo_espaco'];
        $tamanho = $_POST['tamanho'];
        $capacidade = $_POST['capacidade'];
        $endereco = $_POST['endereco'];
        $idespaco = $_POST['idespaco'];
        alterarEspaco($tipo_espaco, $tamanho, $capacidade, $endereco, $idespaco);
    } else {
        $espaco = consultaEpaco($_GET['id']);
    }

?>

<h2>Alterar Espaço</h2>

<form method="post">

    <input type="hidden" name="idespaco" value="<?= $espaco['idespaco'] ?>" >
                        
    <div class="mb-3">
        <label for="tipo_espaco" class="form-label">Tipo do Espaço</label>
        <select id="tipo_espaco" name="tipo_espaco" class="form-select" required="">
            <option value="piscina" <?php if ($espaco['tipo_espaco'] == 'piscina') echo "selected"; ?>>Piscina</option>
            <option value="campo de futebol" <?php if ($espaco['tipo_espaco'] == 'campo de futebol') echo "selected"; ?>>Campo de Futebol</option>
            <option value="quadra de volei" <?php if ($espaco['tipo_espaco'] == 'quadra de volei') echo "selected"; ?>>Quadra de Vôlei</option>
            <option value="quadra de basquete" <?php if ($espaco['tipo_espaco'] == 'quadra de basquete') echo "selected"; ?>>Quadra de Basquete</option>
            <option value="salao de festa" <?php if ($espaco['tipo_espaco'] == 'salao de festa') echo "selected"; ?>>Salão de Festa</option>
            <option value="auditorio" <?php if ($espaco['tipo_espaco'] == 'auditorio') echo "selected"; ?>>Auditório</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="tamanho" class="form-label">Informe o Tamanho do Espaço</label>
        <input value="<?= $espaco['tamanho'] ?>" type="text" id="tamanho" name="tamanho" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="capacidade" class="form-label">Informe a Capacidade do Espaço</label>
        <input value="<?= $espaco['capacidade'] ?>" type="text" id="capacidade" name="capacidade" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="endereco" class="form-label">Informe a Endereço do Espaço</label>
        <input value="<?= $espaco['endereco'] ?>" type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>