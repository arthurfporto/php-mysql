<?php
if (isset($_POST['botao'])) {
  // Conectando com o banco (veja o arquivo bd_conexao.php)
  // Agora existe o obj $con conectado com o BD
  require_once('../00 - BD/bd_conexao.php');

  // Recebendo as informações do form-alterar.php
  $varId = $_POST['campoId'];
  $varEmail = $_POST['campoEmail'];
  $varSenha = $_POST['campoSenha'];
  $varNome = $_POST['campoNome'];

  // Criando a minha string com o código SQL de atualização
  $sql = "
  UPDATE usuario 
  SET usuEmail = '$varEmail', usuSenha = '$varSenha', usuNome= '$varNome'
  WHERE usuId = $varId
  ";

  // Mandando a Query para o banco!
  if ($con->query($sql) === TRUE) {
    $flag = 1;
  } else {
    $flag = 0;
  }

  // Fechando a conexão
  fecharConexao($con);

  header("Location: form-alterar.php?result=$flag&campoId=$varId");
} else {
  header("Location: listar.php");
}