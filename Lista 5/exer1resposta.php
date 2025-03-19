<?php
declare(strict_types=1); //obriga a tipagem da qualquer método ou atributo
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $contatos = array();
            $nomes = $_POST['nome']; 
            $telefones = $_POST['fone']; 
    
            
            for ($i = 0; $i < 5; $i++) {
                $nome = $nomes[$i]; 
                $fone = $telefones[$i]; 
    
                // Verifica se o nome já existe no array
                $nomeExiste = false;
                foreach($contatos as $chave => $valor){
                    if ($chave == $nome){
                        $nomeExiste = true;
                        break;
                    }
                }
                if ($nomeExiste){
                    echo "O nome '$nome' já está cadastrado!!<br>";
                    continue;
                }
                // Verifica se o telefone já foi cadastrado
                if (in_array($fone, $contatos)) {
                    echo "O telefone '$fone' já está cadastrado.<br>";
                    continue; 
                }

                $contatos[$nome] = $fone;
            }

            // Ordena os contatos alfabeticamente pelos nomes (chaves do array)
            ksort($contatos);

            
            echo "<h2>Lista de Contatos</h2>";
            echo "<ul>";
            foreach ($contatos as $nome => $fone) {
                echo "<li><strong>$nome</strong>: $fone</li>";
            }
            echo "</ul>";

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

1. Crie um formulário que leia dados de 5 contatos: nome e número de
telefone. Leia os dados e crie um mapa ordenado onde as chaves são os
nomes dos contatos e os valores são os números de telefone. Verifique se
há duplicatas de nome ou número de telefone antes de adicionar um novo
contato. Exiba a lista ordenada pelos nomes dos contatos.