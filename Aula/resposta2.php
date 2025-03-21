<?php
    declare(strict_types = 1); //OBRIGA QUE TODAS AS FUNÇÕES E VARIÁVEIS TENHAM TIPO DEFINIDO
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemplo 06-03</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <h1>Exemplo de uso de funçoes</h1>
  
    <?php

        function manipularString (string $palavra): void {
            echo "<p> A palavra possui: " . strtolower($palavra). "caracteres </p>";
            echo "<p> Letra A substituída por 4: ".str_replace ("a", "4", $palavra). "</p>";
        }

        function gerarValorAleatorio (int $inicial, int $final): int {
            return rand ($inicial, $final); // rand gera números aleatórios
        }

        if ($_SERVER ['REQUEST_METHOD'] == "POST"){
            try {
                $palavra = $_POST['palavra'];
                manipularString (strtolower ($palavra)); // strtolower transforma tudo em minúsculo

                $valor = gerarValorAleatorio (1, 20);
                echo "<p>O valor gerado foi: $valor</p>";

                $numero = 3.5555555;
                echo "<p> Mostrando duas casa decimais: ".number_format($numero, 2, ",", "."). "</p>";

            }catch (Exception $e){
                echo "Erro: ".$e ->getMessage();
            }
        }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>