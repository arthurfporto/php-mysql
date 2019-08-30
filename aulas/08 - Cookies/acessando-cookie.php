<?php
if (isset($_COOKIE['nomeUsuario']))
  echo "O valor do cookie é: " . $_COOKIE['nomeUsuario'];
else
  echo "Cookie não existe!";