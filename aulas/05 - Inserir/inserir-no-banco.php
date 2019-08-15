<?php
if (isset($_POST['botao'])) {
  // Conectando com o banco (veja o arquivo bd_conexao.php)
  // Agora existe o obj $con conectado com o BD
  require_once('../00 - BD/bd_conexao.php');

  // Recebendo as informações do form-inserir.php
  $varEmail = $_POST['campoEmail'];
  $varSenha = $_POST['campoSenha'];
  $varNome = $_POST['campoNome'];

  // Criando a minha string com o código SQL de inserção
  $sql = "
INSERT INTO usuario (usuEmail, usuSenha, usuNome)
VALUES ('$varEmail', '$varSenha', '$varNome')
";

  // Mandando a Query para o banco!
  if ($con->query($sql) === TRUE) {
    $flag = 1;
  } else {
    $flag = 0;
  }

  // Fechando a conexão
  fecharConexao($con);

  header("Location: form-inserir.php?result=$flag");
} else {
  header("Location: form-inserir.php");
}