<?php 

  include_once("classes/conexao.php");

  $consulta = "SELECT * FROM usuario";
  $con = mysqli_query($conexao,$consulta) or die(mysqli_error());

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário</title>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    
  </head>
  <body>

        <div class="container">

          <div class="page-header">
            <h1>Formulário</h1>
          </div>

          <div class="row">
            
            <div class="col-md-5">
              <h3>Cadastrar</h3> 

              <form method="post" action="classes/processa.php">

                <div  class="form-group">
                 	<label for="nome">Nome:</label>
                 	<div class="row">
                 		<div class="col-md-11">
                 			<input type="text" class="form-control" name="nome" placeholder="Nome" autofocus="" maxlength="40" required>
                 		</div><!--// col -->
              		</div><!--// row -->
              	</div>

                <div  class="form-group">
                  	<label for="nome">Idade:</label>
                  	<div class="row">
                  		<div class="col-md-2">
                  			<input type="number" class="form-control" name="idade" min="1" max="100" maxlength="3" required>
                  		</div><!--// col -->
                  	</div><!--// row -->
                </div>

                <div  class="form-group">
                  <label for="email">E-Mail:</label>
                  <div class="row">
                  	<div class="col-md-10">
                  		<input type="email" class="form-control" name="email" placeholder="Email" maxlength="40" required>
                  	</div><!--// col -->
                  </div><!--// row -->
                </div>

                <div  class="form-group">
                  <label for="senha">Senha:</label>
                  <div class="row">
                  	<div class="col-md-3">
                  		<input type="password" class="form-control" name="senha" placeholder="Senha" maxlength="15" required>
                  	</div><!--// col -->
                  </div><!--// row -->
                </div>

        				<div class="form-group">
        					<label for="foto">Foto:</label>
        					<input type="file" class="form-control-file" name="foto">
        				</div>

                <button type="submit" class="btn btn-primary" >Cadastrar</button>

              </form>

            </div><!--// row -->

            <div class="col-md-7">

              <h3>Consultar</h3>

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>E-Mail</th>
                    <th>Senha</th>
                    <th colspan="2">Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($dado = $con->fetch_array()){ ?>
                  <tr>
                    <td><?php echo $dado["CODIGO"]; ?></td>
                    <td><?php echo $dado["NOME"]; ?></td>
                    <td><?php echo $dado["IDADE"]; ?></td>
                    <td><?php echo $dado["EMAIL"]; ?></td>
                    <td><?php echo $dado["SENHA"]; ?></td>
                    <td>
                      <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dado["NOME"]; ?>" data-whateveridade="<?php echo $dado["IDADE"]; ?>" data-whateveremail="<?php echo $dado["EMAIL"]; ?>" data-whateversenha="<?php echo $dado["SENHA"]; ?>" data-whatevercodigo="<?php echo $dado["CODIGO"]; ?>">Editar</a>
                      
                    </td>
                    <td>
                      <a href="" class="btn btn-danger">Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div><!--// col -->

          </div> <!--// row -->

          <!-- MODAL -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div><!--// Header -->

                <!-- Body -->
                <div class="modal-body">
                  <form method="POST" action="http://localhost/cadastro/classes/processa_editar.php" enctype="multipart/form-data">
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
                      <label for="recipient-email" class="control-label">Senha:</label>
                      <div class="row">
                        <div class="col-md-4">
                          <input type="text" name="senha" class="form-control" id="recipient-senha">
                        </div><!--// col -->
                      </div><!--// row -->
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
          </div><!--// MODAL -->  

        </div> <!--// Container -->
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
    </script>

  </body>
</html>