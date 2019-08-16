<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <!-- Icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <title>Listar Usuários</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9 mx-auto">

          <?php
        if (isset($_GET['result']) && $_GET['result'] == 0) {
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Operação não realizada!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        } elseif (isset($_GET['result']) && $_GET['result'] == 1) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Operação realizada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        }
        ?>
          <?php
        // Conectando com o banco (veja o arquivo bd_conexao.php)
        // Agora existe o obj $con conectado com o BD
        require_once('../00 - BD/bd_conexao.php');

        // Criando a minha string com o código SQL de consulta
        $sql = "
        SELECT *
        FROM usuario
        ";
        // Mandando uma instrução SQL Query para o banco. 
        $resultado = $con->query($sql); ?>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">Nome</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
            while ($infoUsuario = mysqli_fetch_object($resultado)) {
              ?>
              <tr>
                <th scope="row"><?php echo $infoUsuario->usuId; ?></th>
                <td><?php echo $infoUsuario->usuEmail; ?></td>
                <td><?php echo $infoUsuario->usuSenha; ?></td>
                <td><?php echo $infoUsuario->usuNome; ?></td>
                <td>
                  <a href="#">
                    <i class="far fa-edit text-warning fa-lg"></i>
                  </a>
                  <a href="excluir-no-banco.php?campoId=<?php echo $infoUsuario->usuId; ?>">
                    <i class="fas fa-trash-alt text-danger fa-lg"></i>
                  </a>
                </td>
              </tr>
              <?php
            }
            ?>
            </tbody>
          </table>
          <?php
        // Fechando a conexção
        fecharConexao($con);
        ?>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  </body>

</html>