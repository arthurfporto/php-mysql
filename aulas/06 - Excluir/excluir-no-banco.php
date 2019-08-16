<?php
if (isset($_GET['campoId'])) {
  // Conectando com o banco (veja o arquivo bd_conexao.php)
  // Agora existe o obj $con conectado com o BD
  require_once('../00 - BD/bd_conexao.php');

  // Recebendo as informações do form-excluir.php
  $id = $_GET['campoId'];

  // Criando a minha string com o código SQL de exclusão
  $sql = "
  DELETE FROM usuario
  WHERE usuId = $id
  ";

  // Mandando a Query para o banco!
  if ($con->query($sql) === TRUE) {
    $flag = 1;
  } else {
    $flag = 0;
  }

  // Fechando a conexão
  fecharConexao($con);

  if (isset($_GET['botao'])) {
    header("Location: form-excluir.php?result=$flag");
  } else {
    header("Location: listar.php?result=$flag");
  }
} else {
  header("Location: form-inserir.php");
}