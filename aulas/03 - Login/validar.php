<?php 
// Conectando com o banco (veja o arquivo bd_conexao.php)
// Agora existe o obj $con conectado com o BD
require_once('bd_conexao.php');

// Pegando as informações do formulário.
$email  = $_POST['usuEmail'];
$senha  = $_POST['usuSenha'];

// Criando a minha string com o código SQL de consulta
$sql = "
SELECT *
FROM usuario
WHERE usuEmail = '$email' AND usuSenha = '$senha'
";

// Mando a SQL para o banco através do método query da 
//    classe de conexão mysqli() expressa pelo obj $con
$resultado = $con->query($sql);

// Transformando a estrutura do $resultado em um obj.
//    com as informações dos campos da tabela no BD.
$infoUsuario = mysqli_fetch_object($resultado);

if (empty($infoUsuario)) {
  header("Location: login.php");
} else {  
  header("Location: area-restrita.php?nome=$infoUsuario->usuNome");
}
?>
