<?php
if (!isset($_GET['campoId']))
  header('Location: listar.php')
  ?>

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

    <title>Alterar Usuário</title>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 mx-auto">

          <?php
        if (isset($_GET['result']) && $_GET['result'] == 0) {
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Erro ao inserir no banco!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        } elseif (isset($_GET['result']) && $_GET['result'] == 1) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Inserção realizada com sucesso!
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

        // Pegando o id apartir da url
        $varId = $_GET['campoId'];

        // Criando a minha string com o código SQL de consulta
        $sql = "
        SELECT *
        FROM usuario
        WHERE usuId = $varId
        ";
        // Mandando uma instrução SQL Query para o banco. 
        $resultado = $con->query($sql);
        $infoUsuario = mysqli_fetch_object($resultado);
        ?>

          <form action="alterar-no-banco.php" method="post">
            <div class="form-group">
              <label for="exampleInputId">ID</label>
              <input value="<?php echo $infoUsuario->usuId; ?>" name="id" type="number" disabled class="form-control"
                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Digite o e-mail">
              <input type="hidden" name="campoId" value="<?php echo $infoUsuario->usuId; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail">Email</label>
              <input value="<?php echo $infoUsuario->usuEmail; ?>" name="campoEmail" type="email" class="form-control"
                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Digite o e-mail">
            </div>
            <div class="form-group">
              <label for="exampleInputSenha">Senha</label>
              <input value="<?php echo $infoUsuario->usuSenha; ?>" name="campoSenha" type="text" class="form-control"
                id="exampleInputSenha" aria-describedby="senhaHelp" placeholder="Digite a senha">
            </div>
            <div class="form-group">
              <label for="exampleInputNome">Nome</label>
              <input value="<?php echo $infoUsuario->usuNome; ?>" name="campoNome" type="text" class="form-control"
                id="exampleInputNome" aria-describedby="nomeHelp" placeholder="Digite o seu nome">
            </div>
            <button type="submit" name="botao" class="btn btn-primary btn-block">Salvar</button>
          </form>
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