<?php
    require_once("cabecalho.php");

    function retornaEspaco(){ // EXIBE O ESPAÇO CADASTRADO NA RESERVA
        require("conexao.php");
        try{
            $sql = "SELECT * FROM espaco";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $e){
            die("Erro ao consultar espaços: " . $e->getMessage());
        }
    }

    function retornaEvento(){ // EXIBE O TIPO DE EVENTO CADASTRADO NA RESERVA
        require("conexao.php");
        try{
            $sql = "SELECT * FROM evento";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $e){
            die("Erro ao consultar eventos: " . $e->getMessage());
        }
    }

    function retornaLocatario(){ // EXIBE O LOCATÁRIO CADASTRADO NA RESERVA
        require("conexao.php");
        try{
            $sql = "SELECT * FROM locatario";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $e){
            die("Erro ao consultar locatários: " . $e->getMessage());
        }
    }

    function retornaReserva($idresera){ // INFORMA O ID DA RESERVA DESEJADA
        require("conexao.php");
        try{
            $sql = "SELECT * FROM reserva WHERE idreserva = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idresera]);
            $reserva = $stmt->fetch();
            if (!$reserva)
                die("Erro ao retornar a reserva!");
            else   
                return $reserva;
        } catch(Exception $e){
            die("Erro ao consultar a reserva: " . $e->getMessage());
        }
    }

    function alterarReserva($data_hora_inicio, $data_hora_final, $valor_taxa, $tipo_evento, $tipo_espaco, $cpf, $idresera){ //ALTERA O CAMPO DESEJADO
        require("conexao.php");
        try{
            $sql = "UPDATE reserva SET data_hora_inicio = ?, data_hora_final = ?, valor_taxa = ?, tipo_evento = ?, tipo_espaco = ?, cpf = ?  WHERE idreserva = ?"; // SALVA A ALTERAÇÃO REALIZADA NO BANCO DE DADOS
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$data_hora_inicio, $data_hora_final, $tipo_evento, $tipo_espaco, $cpf, $idresera]))
                header('location: reservas.php?edicao=true');
            else
            header('location: reservas.php?edicao=false');
        }catch (Exception $e){
            die("Erro ao alterar a reserva: ". $e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $idresera = $_POST['idreserva'];
        $data_hora_inicio = $_POST['$data_hora_inicio'];
        $data_hora_final = $_POST['$data_hora_final'];
        $tipo_evento = $_POST['tipo_evento'];
        $tipo_espaco = $_POST['tipo_espaco'];        
        $cpf = $_POST['cpf'];
        alterarReserva($data_hora_inicio, $data_hora_final, $tipo_evento, $tipo_espaco, $cpf, $idresera);
    } else{
        $espacos = retornaEspaco();
        $eventos = retornaEvento();
        $locatarios = retornaLocatario();
        $reservas = retornaReserva($_GET['id']);
    }
?>

    <h2>Editar Reserva</h2>

    
    <form method="post">

        <input type="hidden" name="idreserva" value="<?= $reservas['idreserva'] ?>" >
        
        <div class="mb-3">
            <label for="data_hora_inicio" class="form-label">Data e Hora do Início da Reserva</label>
            <input value="<?= $reservas['data_hora_inicio'] ?>" type="datetime-local" id="data_hora_inicio" name="data_hora_inicio" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="data_hora_final" class="form-label">Data e Hora Final da Reserva</label>
            <input value="<?= $reservas['data_hora_final'] ?>" type="datetime-local" id="data_hora_final" name="data_hora_final" class="form-control" rows="4" required=""></textarea>
        </div>

        <div class="mb-3">
            <label for="valor_taxa" class="form-label">Valor</label>
            <input value="<?= $reservas['valor_taxa'] ?>" type="number" id="valor_taxa" name="valor_taxa" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="espaco" class="form-label">Tipo do Espaco</label>
            <select id="espaco" name="espaco" class="form-select" required="">
                <?php
                    foreach($espacos as $e):
                ?>
                    <option value="<?= $e['idespaco'] ?>" 
                        <?php if ($e['idespaco'] == $reservas['espaco_idespaco']) echo "selected" ?> 
                    ><?= $e['tipo_espaco'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_evento" class="form-label">Tipo do Evento</label>
            <input value="<?= $reservas['tipo_evento'] ?>" type="text" id="tipo_evento" name="tipo_evento" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF do Locatário</label>
            <input value="<?= $reservas['cpf'] ?>" type="text" id="cpf" name="cpf" class="form-control" required="">
        </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="button" class="btn btn-secondary"
             onclick="history.back();">Voltar</button>
    </form>


<?php
    require_once("rodape.php");