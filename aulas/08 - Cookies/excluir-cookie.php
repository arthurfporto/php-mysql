<?php
if (isset($_COOKIE['nomeUsuario'])) {
  setcookie('nomeUsuario', '', time() - 60);
  echo 'Cookie foi Excluido!!';
} else
  echo "Cookie não existe!";