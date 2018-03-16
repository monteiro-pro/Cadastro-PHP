<?php
		include_once("conexao.php");

    $codigo = $_POST['codigo'];

		$sql = "DELETE FROM usuario WHERE CODIGO = '$codigo'";
		$excluir = mysqli_query($conexao, $sql);

		$linhas = mysqli_affected_rows($conexao);

		mysqli_close($conexao);
 
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conf. de Exclusão</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
  </head>
  <body>

  	<div class="container">
  		<div class="page-header">
  			<h1>Confirmação de Exclusão</h1>
  		</div>

      <?php 

  			if ($linhas == 1) {	?>	

          <!-- Modal -->
  				<div class="modal fade" id="janela">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Exclusão Realizado com Sucesso!</h3>
                </div>
                <div class="modal-body">                 
                  Usuário Excluido             
                </div>
                <div class="modal-footer">                 
                  <a href="../index.php" class="btn btn-primary">OK</a>
                </div>
              </div>
            </div>
          </div><!--// Modal -->
          <script>
            $(document).ready(function () {
              $('#janela').modal('show');
            });
          </script>
  			
       <?php }else{ ?>

  				<!-- Modal -->
          <div class="modal fade" id="janela">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Erro ao Excluir Usuário!</h3>
                </div>
                <div class="modal-body">                 
                  <?php echo 'Erro no Banco de Dados!' ?>                 
                </div>
                <div class="modal-footer">                 
                  <a href="../index.php" class="btn btn-danger">OK</a>
                </div>
              </div>
            </div>
          </div><!--// Modal -->

          <!-- Show Modal -->
          <script>
            $(document).ready(function () {
              $('#janela').modal('show');
            });
          </script><!--// Show Modal -->

  			<?php } ?>

  		<div>
  			<a class="btn btn-primary" href="../index.php">Voltar</a>
  		</div>

  	</div><!-- Conteiner -->

  </body>
</html>