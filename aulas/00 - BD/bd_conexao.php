<?php // Arquivo bd_conexao.php
// #### Declaração de funções!!!
// Função de conexão com o banco
function conectarBanco($local, $usuario, $senha, $banco)
{
  $conexao = new mysqli();  // Objeto da classe de conexão mysqli
  $conexao->connect($local, $usuario, $senha, $banco);  // Conexão com o BD
  $conexao->set_charset("utf8");  // Permitir a codificação UTF8
  return $conexao;
}
// Funções de Encerrar a conexão
function fecharConexao($conexao)
{
  $conexao->close();
}
// #### Fim Declaração de funções!!!

// Fornece as informações de conexão
require_once('bd_config.php');

// Chamada da função com informações vindas do bd_config.php
$con = conectarBanco($bd_host, $bd_usu, $bd_senha, $bd_banco);