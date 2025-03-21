<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

    <form action="exemplo_array.php" method="post">
        <?php for ($i=0; $i<10; $i++): ?> 
            <input type="number" name="valor[]" placeholder="Informe o valor <?= $i ?>" />  
        <?php endfor; ?>
        <button type="submit"> Enviar </button>

        <?php 

            if ($_SERVER ['REQUEST_METHOD'] == "POST"){
                try {
                    $valores = $_POST ['valor']; // $_POST é um array um vetor
                    echo "O primeiro  valor é: ".$valores[0];
                    echo "<br/>";
                    print_r ($valores); // ou var_dump ($valores); mostra o tipo dos dados também se é string....
                    $valores ['texto'] = 'dados';
                    unset ($valores ['texto']);
                    echo "<br/>";
                    foreach ($valores as $c => $v){ // $c => $v pega posição e o valor só $v pega só o valor
                        echo "<p>Posição: $c - Valor: $v</p>";
                    }

                    $array = [10, 11, 12, 13];
                    $array2 = array ("uva, maçã, pera");
                    $arrey3 = [
                        "uva" => 3,
                        "maçã" => 4,
                        "pera" => 5
                    ];

                } catch (Exception $e) {
                    echo $e ->getMessage();
                }
            }
        ?>

    </form>

</body>
</html>