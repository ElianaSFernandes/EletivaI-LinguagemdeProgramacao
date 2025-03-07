<?php
    declare(strict_types = 1); //OBRIGA QUE TODAS AS FUNÇÕES E VARIÁVEIS TENHAM TIPO DEFINIDO
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <h1>Resposta do Exercício 4 da Lista 4</h1>
  
    <?php

        function validarData(int $dia, int $mes, int $ano): bool {
            return checkdate($dia, $mes, $ano);
        }
        
        if ($_SERVER ['REQUEST_METHOD'] == "POST"){
            try {
                $dia = (int) $_POST['dia'];
                $mes = (int) $_POST['mes'];
                $ano = (int) $_POST['ano'];
                
                if (validarData($dia, $mes, $ano)) {
                    $dataFormatada = sprintf("%02d/%02d/%04d", $dia, $mes, $ano);
                    echo "$dataFormatada";
                } 
                
                else {
                    echo "Data inválida.";
                }

            }catch (Exception $e){
                echo "Erro: ".$e ->getMessage();
            }
        }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

