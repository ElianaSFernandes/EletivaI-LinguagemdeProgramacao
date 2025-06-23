<?php
  require_once("cabecalho.php");

  echo "<h2> usuário: ".$_SESSION['usuario']." </h2>"; // ESSA É A PRIMEIRA TELA APÓS O LOGIN
?>
  <p><a href="sair.php">Sair</a></p>
<?php
  require_once("rodape.php");
?>