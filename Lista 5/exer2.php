<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="exer2resposta.php" method="POST">

        <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="mb-3">
                <label for="nome" class="form-label">Informe o nome do aluno: </label>
                <input type="text" name="nome[]" placeholder="Nome" />
            </div>

            <div class="mb-3">
                <label for="nota1" class="form-label">Informe a primeira nota: </label>
                <input type="number" name="nota1[]" placeholder="Nota 1" />
            </div>

            <div class="mb-3">
                <label for="nota2" class="form-label">Informe a segunda nota: </label>
                <input type="number" name="nota2[]" placeholder="Nota2" />
            </div>

            <div class="mb-3">
                <label for="nota3" class="form-label">Informe a terceira nota: </label>
                <input type="number" name="nota3[]" placeholder="Nota 3" />
            </div>
        <?php endfor; ?>
        <button type="submit">Enviar</button>
    </form>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>


Crie um formulário que leia dados de 5 alunos: nome e três notas. Leia os
dados e crie um mapa ordenado onde as chaves são os nomes dos alunos
e os valores são as médias das notas. Exiba a lista de alunos ordenada pela
média das notas (do maior para o menor).