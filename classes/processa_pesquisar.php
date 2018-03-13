<?php
	include_once("conexao.php");

	$pesquisa = $_POST['pesquisa'];

	$diretorio = "../img/";

	$sql = "SELECT * FROM usuario WHERE NOME LIKE '%$pesquisa%'";
	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error());

	$linhas = mysqli_affected_rows($conexao);

	mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conf. de Cadastro</title>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
  </head>
  <body>

  	<div class="container">
  		<div class="page-header">
  			<h1>Resultado da Pesquisa</h1>
  		</div>

      	<table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>E-Mail</th>
                <th>Senha</th>
                <th>Foto</th>
                <th colspan="2">Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php while($dado = $resultado->fetch_array()){ ?>
              <tr>
                <td><?php echo $dado["CODIGO"]; ?></td>
                <td><?php echo $dado["NOME"]; ?></td>
                <td><?php echo $dado["IDADE"]; ?></td>
                <td><?php echo $dado["EMAIL"]; ?></td>
                <td><?php echo $dado["SENHA"]; ?></td>
                <td><img src="<?php echo $diretorio.$dado["FOTO"]; ?>"></td>
                <td>
                  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dado["NOME"]; ?>" data-whateveridade="<?php echo $dado["IDADE"]; ?>" data-whateveremail="<?php echo $dado["EMAIL"]; ?>" data-whateversenha="<?php echo $dado["SENHA"]; ?>" data-whatevercodigo="<?php echo $dado["CODIGO"]; ?>">Editar</a> | 
               
                  <a href="" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" data-whatever="<?php echo $dado["NOME"]; ?>" data-whatevercodigo="<?php echo $dado["CODIGO"]; ?>">Excluir</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table><br><!--// CONSULTA -->

          <div>
  			<a class="btn btn-primary" href="../index.php">Voltar</a>
  		</div>

  		<!-- MODAL EDITAR -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" id="exampleModalLabel"></h3>
                </div><!--// Header -->

                <!-- Body -->
                <div class="modal-body">
                  <form method="POST" action="../classes/processa_editar.php" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Nome:</label>
                      <div class="row">
                        <div class="col-md-10">
                          <input type="text" name="nome" class="form-control" id="recipient-name">
                        </div><!--// col -->
                      </div><!--// row -->
                    </div>

                    <div class="form-group">
                      <label for="recipient-idade" class="control-label">Idade:</label>
                      <div class="row">
                        <div class="col-md-2">
                          <input type="text" name="idade" class="form-control" id="recipient-idade">
                        </div><!--// col -->
                      </div><!--// row -->
                    </div>

                    <div class="form-group">
                      <label for="recipient-email" class="control-label">E-Mail:</label>
                      <div class="row">
                        <div class="col-md-9">
                          <input type="text" name="email" class="form-control" id="recipient-email">
                        </div><!--// col -->
                      </div><!--// row -->
                    </div>

                    <div class="form-group">
                      <label for="recipient-senha" class="control-label">Senha:</label>
                      <div class="row">
                        <div class="col-md-4">
                          <input type="text" name="senha" class="form-control" id="recipient-senha">
                        </div><!--// col -->
                      </div><!--// row -->
                    </div>

                    <div class="form-group">
                      <label for="recipient-foto" class="control-label">Foto:</label>
                      <input type="file" class="form-control-file" id="recipient-foto" name="foto">
                    </div>

                    <input type="hidden" name="codigo" id="recipient-codigo">

                    <!-- Footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Alterar</button>
                    </div><!--// Footer -->

                  </form>
                </div><!--// Body -->

              </div><!--// Modal-Content -->
            </div>
          </div><!--// MODAL EDITAR -->

          <!-- MODAL EXCLUIR -->
          <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title-excluir" id="exampleModalLabel"></h3>
                </div><!--// Header -->

                <form method="POST" action="../classes/processa_excluir.php" enctype="multipart/form-data">
                  <input type="hidden" name="codigo" id="recipient-codigo">

                  <!-- Footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                  </div><!--// Footer -->
                </form>

              </div><!--// Modal-Content -->
            </div>
          </div><!--// MODAL EXCLUIR -->

        </div> <!--// Container -->
      
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

		<!-- Modal Editar -->
		<script type="text/javascript">
		  $('#exampleModal').on('show.bs.modal', function (event) {
		    var button = $(event.relatedTarget) 
		    var recipient = button.data('whatever')
		    var recipientidade = button.data('whateveridade')
		    var recipientemail = button.data('whateveremail')
		    var recipientsenha = button.data('whateversenha')
		    var recipientcodigo = button.data('whatevercodigo')
		    var modal = $(this)
		    modal.find('.modal-title').text('Editar Usuário ' + recipientcodigo + ' ' + recipient)
		    modal.find('#recipient-name').val(recipient)
		    modal.find('#recipient-idade').val(recipientidade)
		    modal.find('#recipient-email').val(recipientemail)
		    modal.find('#recipient-senha').val(recipientsenha)
		    modal.find('#recipient-codigo').val(recipientcodigo)
		  })
		</script><!--// Modal Editar -->

		<!-- Modal Excluir -->
		<script type="text/javascript">
		  $('#modalExcluir').on('show.bs.modal', function (event) {
		    var button = $(event.relatedTarget) 
		    var recipient = button.data('whatever')
		    var recipientcodigo = button.data('whatevercodigo')
		    var modal = $(this)
		    modal.find('.modal-title-excluir').text('Excluir Usuário ' + recipientcodigo + ' ' + recipient + ' ?')
		    modal.find('#recipient-name').val(recipient)
		    modal.find('#recipient-codigo').val(recipientcodigo)
		  })
		</script><!--// Modal Excluir -->

  </body>
</html>