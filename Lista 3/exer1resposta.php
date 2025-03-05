<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Resposta do Exercício 1!</h1>
    <?php
        if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
            try {
                $numero1 = $_POST ['numero1'];
                $numero2 = $_POST ['numero2'];
                $numero3 = $_POST ['numero3'];
                $numero4 = $_POST ['numero4'];
                $numero5 = $_POST ['numero5'];
                $numero6 = $_POST ['numero6'];
                $numero7 = $_POST ['numero7'];              
                $numero_menor = $numero1;
                $posicao = 1;

                for ($i = 0; $i < 7; $i ++){
                  switch ($i){
                    case 0:
                      $numero_menor = $numero1;
                      break;

                    case 1:
                      $numero_menor = $numero2;
                      break;
                    
                    case 2:
                      $numero_menor = $numero3;
                      break;
                    
                    case 3:
                      $numero_menor = $numero4;
                      break;

                    case 4:
                      $numero_menor = $numero5;
                      break;

                    case 5:
                      $numero_menor = $numero6;
                      break;

                    case 6:
                      $numero_menor = $numero7;
                      break;
                  }

                  if ($numero_menor < $numero1){
                    $numero1 = $numero_menor;
                    $posicao = $i;
                  }
                }
                echo "O menor número digitado é o: $numero1 e ele foi o $posicao digitado";
                

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>