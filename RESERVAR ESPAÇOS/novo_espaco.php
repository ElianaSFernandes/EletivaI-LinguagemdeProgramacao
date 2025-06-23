<?php

    require_once("cabecalho.php");

    function inserirEspaco($tipo_espaco, $tamanho, $capacidade, $endereco){ // CADASTRA UM NOVO ESPAÇO
        require("conexao.php");
        try{
            $sql = "INSERT INTO espaco (tipo_espaco, tamanho, capacidade, endereco) VALUES (?, ?, ?, ?)"; // OS PONTOS DE INTERROGAÇÃO SÃO OS VALORES A SEREM INSERIDOS NO BANCO NOS CAMPOS RELATIVOS AO ESPAÇO
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$tipo_espaco, $tamanho, $capacidade, $endereco])){
                header('location: espacos.php?cadastro=true');
            } else {
                header('location: espacos.php?cadastro=false');
            }
        } catch (Exception $e){
            die("Erro ao inserir o espaço: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $tipo_espaco = $_POST['tipo_espaco'];
        $tamanho = $_POST['tamanho'];
        $capacidade = $_POST['capacidade'];
        $endereco = $_POST['endereco'];
        inserirEspaco($tipo_espaco, $tamanho, $capacidade, $endereco);
    }

?>

<h2>Novo Espaço</h2>

<form method="post">
                        
    <div class="mb-3">
        <label for="tipo_espaco" class="form-label">Tipo do Espaço</label>
        <select id="tipo_espaco" name="tipo_espaco" class="form-select" required="">
            <option value="Piscina">Piscina</option>
            <option value="campo de futebol">Campo de Futebol</option>
            <option value="quadra de volei">Quadra de Vôlei</option>
            <option value="quadra de basquete">Quadra de Basquete</option>
            <option value="salao de festa">Salão de Festa</option>
            <option value="auditório">Auditório</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="tamanho" class="form-label">Informe o Tamanho do Espaço</label>
        <input type="text" id="tamanho" name="tamanho" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="capacidade" class="form-label">Informe a Capacidade do Espaço</label>
        <input type="text" id="capacidade" name="capacidade" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="endereco" class="form-label">Informe o Endereço do Espaço</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>