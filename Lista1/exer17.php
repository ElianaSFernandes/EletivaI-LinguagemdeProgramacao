<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Exercício 17!</h1>
    
    <form method="post" action="exer17resposta.php">
                        
    <div class="mb-3">
        <label for="capital" class="form-label">Informe o valor do capital:</label>
        <input type="number" step="0.01" id="capital" name="capital" class="form-control">
    </div>

    <div class="mb-3">
        <label for="taxa" class="form-label">Informe a taxa de juros:</label>
        <input type="number" step="0.01" id="taxa" name="taxa" class="form-control">
    </div>

    <div class="mb-3">
        <label for="meses" class="form-label">Informe o período em meses:</label>
        <input type="number" id="meses" name="meses" class="form-control">
    </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
            

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>