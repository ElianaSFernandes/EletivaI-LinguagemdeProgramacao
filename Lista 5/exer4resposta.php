<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $produtos = array();
            $nomes = $_POST['nome']; 
            $precos = $_POST['preco'];

            // Criando um array associativo para manter a relação entre nome e preço
            $item = [];
            for ($i = 0; $i < count($nomes); $i++) {
                $preco = (float) $precos[$i];

                // Aplicar imposto de 15%
                $valores = $preco + (($preco * 15) / 100);

                $item[$nomes[$i]] = ['preco' => $valores];
            }   
            
            // Ordenar os produtos pelo preco
            uasort($item, function($a, $b) {
                return $a['preco'] <=> $b['preco']; // Operador spaceship
            });

            foreach ($item as $nome => $produto) {
                echo "<p>Produto: {$nome} Preço: R$"  . number_format($produto['preco'], 2, ',', '.'). "</p>";
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


