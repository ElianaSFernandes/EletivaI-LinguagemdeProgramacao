<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $livros = array();
            $titulos = $_POST['titulo']; 
            $qtdes = $_POST['qtde'];

            // Criando um array associativo para manter a relação entre título e quantidade
            
            for ($i = 0; $i < count($titulos); $i++) {
                $titulo = $titulos[$i];
                $qtde = $qtdes[$i];

                // Verificar quantidade mínima em estoque
                if ($qtde < 5) {
                    echo "<p>O livro $titulo está com estoque baixo</p>";
                }
                // Adiciona ao estoque
                $livros[$titulo] = $qtde;
            }   
            
            // Ordenar os livros pelo nome
            ksort($livros);
           
            foreach ($livros as $titulo => $qtde) {
                echo "<p>Livro: $titulo - Quantidade em estoque:  $qtde. </p>";

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

