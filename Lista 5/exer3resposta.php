<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $produtos = array();
            $codigos = $_POST['codigo']; 
            $nomes = $_POST['nome']; 
            $precos = $_POST['preco'];

            // Criando um array associativo para manter a relação entre código, nome e preço
            $dados = [];
            for ($i = 0; $i < count($codigos); $i++) {
                $preco = (float) $precos[$i];

                arsort($dados);

                // Aplicar desconto se o preço for maior que 100
                if ($preco > 100.00) {
                    $preco *= 0.9;
                }

                    $dados[$codigos[$i]] = ['nome' => $nomes[$i], 'preco' => $preco];

            }   
            
            // Ordenar os produtos pelo nome
            uasort($dados, function($a, $b) {
                return strcmp($a['nome'], $b['nome']);
            });

            foreach ($dados as $codigo => $produto) {
                echo "<p>Código: {$codigo} Produto: {$produto['nome']} Preço: R$"  . number_format($produto['preco'], 2, ',', '.'). "</p>";
            }

        } catch (Exception $e) {
            echo $e->getMessage();
    }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

