<?php
session_start();
if (isset($_SESSION['nomeUsu']))
  echo 'O nome do usuário é: ' . $_SESSION['nomeUsu'];
else
  echo 'Essa informção não existe na sessão!';