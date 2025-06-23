<?php

    require_once ("cabecalho.php");

    function retornaEspacos(){ // EXIBE OS TIPOS ESPAÇOS DISPONÍVEIS PARA SELEÇÃO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM espaco";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(Exception $e){
            die("Erro ao consultar espaços: ". $e->getMessage());
        }
    }

    function retornaEventos(){ // EXIBE OS TIPOS DE EVENTOS DISPONÍVEIS PARA SELEÇÃO
        require("conexao.php");
        try{
            $sql = "SELECT * FROM evento";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(Exception $e){
            die("Erro ao consultar eventos: ". $e->getMessage());
        }
    }

    function retornaLocatarios(){ // EXIBE OS LOCATÁRIOS CADASTRADOS NO BANCO QUE PODEM EFETUAR AS RESERVAS
        require("conexao.php");
        try{
            $sql = "SELECT * FROM locatario";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(Exception $e){
            die("Erro ao consultar locatários: ". $e->getMessage());
        }
    }
    
    function inserirReserva ($data_hora_inicio, $data_hora_final, $valor_taxa, $espaco, $evento, $locatario) {  // CADASTRA UMA NOVA RESERVA
        try{
            require "conexao.php";
            $sql = "INSERT INTO reserva (data_hora_inicio, data_hora_final, valor_taxa, espaco_idespaco, evento_idevento, locatario_idlocatario) values (?, ?, ?, ?, ?, ?)"; // INSERE A NOVA RESERVA NO BANCO DE DADOS
            $stmt = $pdo->prepare ($sql);

            if ($stmt -> execute ([$data_hora_inicio, $data_hora_final, $valor_taxa, $espaco, $evento, $locatario])){
                header ('location: reservas.php?cadastro = true');
            }

            else {
                header ('location: reservas.php?cadastro = false');
            }

        }catch (Exception $e){
            die ("Erro ao inserir a reserva: " .$e -> getMessage());
        }
    }

    if ($_SERVER ['REQUEST_METHOD'] == "POST"){
        $data_hora_inicio = $_POST ['data_hora_inicio'];
        $data_hora_final = $_POST ['data_hora_final'];
        $valor_taxa = $_POST ['valor_taxa'];
        $espaco = $_POST ['espaco'];
        $evento = $_POST ['evento'];
        $locatario = $_POST ['locatario'];
        inserirReserva ($data_hora_inicio, $data_hora_final, $valor_taxa, $espaco, $evento, $locatario);
    }

    $espacos = retornaEspacos();
    $eventos = retornaEventos();
    $locatarios = retornaLocatarios();
?>

<?php

    require_once ("rodape.php");
?>

    <h2>Nova Reserva</h2> <!-- FORMULÁRIO PARA CADASTRO DE UMA NOVA RESERVA -->
    
    <form method="post">
                        
        <div class="mb-3">
            <label for="data_hora_inicio" class="form-label">Data e Hora do Início da Reserva</label>
            <input type="datetime-local" id="data_hora_inicio" name="data_hora_inicio" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="data_hora_final" class="form-label">Data e Hora Final da Reserva</label>
            <input type="datetime-local" id="data_hora_final" name="data_hora_final" class="form-control" rows="4" required=""></textarea>
        </div>
        
        <div class="mb-3">
            <label for="valor_taxa" class="form-label">Valor</label>
            <input type="number" id="valor_taxa" name="valor_taxa" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="espaco" class="form-label">Espaço</label>
            <select id="espaco" name="espaco" class="form-select" required="">
                <?php
                    foreach($espacos as $e):
                ?>
                    <option value="<?= $e['idespaco'] ?>"><?= $e['tipo_espaco'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>

         <div class="mb-3">
            <label for="evento" class="form-label">Evento</label>
            <select id="evento" name="evento" class="form-select" required="">  
                <?php
                    foreach($eventos as $v):
                ?>
                    <option value="<?= $v['idevento'] ?>"><?= $v['tipo_evento'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>              
        </div>  

         <div class="mb-3">
            <label for="locatario" class="form-label">Locatario</label>
            <select id="locatario" name="locatario" class="form-select" required="">
                <?php
                    foreach($locatarios as $l):
                ?>
                    <option value="<?= $l['idlocatario'] ?>"><?= $l['cpf'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" onclick= "history.back();">Voltar</button>

    </form>
            

<?php
    require_once ("rodape.php");