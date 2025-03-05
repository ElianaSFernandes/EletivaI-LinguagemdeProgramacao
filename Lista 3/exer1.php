<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Exercício 1!</h1>
    
    <form method="post" action="exer1resposta.php">
    <div class="mb-3">
      <label for="numero1" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o primeiro número:</font></font></label>
      <input type="number" id="numero1" name="numero1" class="form-control">
    </div>

    <div class="mb-3">
        <label for="numero2" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o segundo número:</font></font></label>
        <input type="number" id="numero2" name="numero2" class="form-control">
    </div>

    <div class="mb-3">
        <label for="numero3" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o terceiro número:</font></font></label>
        <input type="number" id="numero3" name="numero3" class="form-control">
    </div>

    <div class="mb-3">
        <label for="numero4" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o quarto número:</font></font></label>
        <input type="number" id="numero4" name="numero4" class="form-control">
    </div>

    <div class="mb-3">
        <label for="numero5" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o quinto número:</font></font></label>
        <input type="number" id="numero5" name="numero5" class="form-control">
    </div>

    <div class="mb-3">
        <label for="numero6" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o sexto número:</font></font></label>
        <input type="number" id="numero6" name="numero6" class="form-control">
    </div>

    <div class="mb-3">
        <label for="numero7" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informe o sétimo número:</font></font></label>
        <input type="number" id="numero7" name="numero7" class="form-control">
    </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

Escreva um programa que leia 7 números diferentes, imprima o menor
valor e imprima a posição do menor valor na sequência de entrada.