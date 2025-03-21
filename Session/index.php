<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sessões</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="sessoesresposta.php" method="POST">

        <?php 
            session_start (); // é um mapa ordenado, um array
            $_SESSION ['usuario'] = "João"; //session é um array do servidor

            setcookie('usuario', 'João', time() + 3600); // criando cookies 3600 é a quantidade de segundos que ele vai ficar ativo
        ?>

        <h1> Bem vindo <?= $_SESSION ['usuario'] ?></h1>    
        <h2> Bem vindo cookie <?= $_COOKIE ['usuario'] ?></h2>     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>