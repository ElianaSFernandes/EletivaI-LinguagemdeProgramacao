<?php

    require_once("cabecalho.php");

    function consultaEvento($id){ // NESTA FUNÇÃO CONSULTAMOS O EVENTO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM evento WHERE idevento = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $evento = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$evento){
                die("Erro ao consultar o registro!");
            } else{
                return $evento;
            }
        } catch(Exception $e){
            die("Erro ao consultar o evento: " . $e->getMessage());
        }
    }

    function alterarEvento($tipo_evento, $idevento){ // COM ESTA FUNÇÃO PODEMOS ALTERAR OS DADOS DE UM DETERMINADO EVENTO
        require("conexao.php");
        try{
            $sql = "UPDATE evento SET tipo_evento ? WHERE idevento = ?";// EFETUA AS ALTERAÇÕES NO BANDO DE DADOS
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$tipo_evento, $idevento])){
                header('location: eventos.php?edicao=true');
            } else {
                header('location: eventos.php?edicao=false');
            }
        } catch (Exception $e){
            die("Erro ao alterar o evento: ".$e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $tipo_evento = $_POST['tipo_evento'];        
        $idevento = $_POST['idevento'];
        alterarEvento($tipo_evento, $idevento);
    } else {
        $evento = consultaEvento($_GET['id']);
    }

?>

<h2>Alterar Evento</h2>

<form method="post">

    <input type="hidden" name="idevento" value="<?= $evento['idevento'] ?>" >
                        
    <div class="mb-3">
        <label for="tipo_evento" class="form-label">Informe o Tipo do Evento</label>
        <select id="tipo_evento" name="tipo_evento" class="form-control" required="">
            <option value="jogo" <?php if ($evento['tipo_evento'] == 'jogo') echo "selected"; ?>>Jogo</option>
            <option value="campeonato" <?php if ($evento['tipo_evento'] == 'campeonato') echo "selected"; ?>>Campeonato</option>
            <option value="festa" <?php if ($evento['tipo_evento'] == 'festa') echo "selected"; ?>>Festa</option>
            <option value="palestra" <?php if ($evento['tipo_evento'] == 'palestra') echo "selected"; ?>>Palestra</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php 
    require_once("rodape.php");

?>