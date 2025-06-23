<?php

    require_once("cabecalho.php");

    function inserirEvento($tipo_evento){  // FUNÇÃO PARA INSERIR UM NOVO EVENTO
        require("conexao.php");
        try{
            $sql = "INSERT INTO evento (tipo_evento) VALUES (?)"; // O PONTO DE INTERROGAÇÃO É O VALOR A SER INSERIDO NO CAMPO RELATIVO AO EVENTO
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$tipo_evento])){
                header('location: eventos.php?cadastro=true');
            } else {
                header('location: eventos.php?cadastro=false');
            }
        } catch (Exception $e){
            die("Erro ao inserir o evento: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $tipo_evento = $_POST['tipo_evento'];        
        inserirEvento($tipo_evento);
    }

?>

<h2>Novo Evento</h2> <!-- CAMPOS RELATIVOS À TABELA EVENTO -->

<form method="post">
                        
    <div class="mb-3">
        <label for="tipo_evento" class="form-label">Tipo do Evento</label>
        <select id="tipo_evento" name="tipo_evento" class="form-select" required="">
            <option value="jogo">Jogo</option>
            <option value="capeonato">Campeonato</option>
            <option value="festa">Festa</option>
            <option value="palestra">Palestra</option>
        </select>            
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>