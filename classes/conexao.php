<?php

	$conexao = mysqli_connect("localhost", "root", "", "cadastro");
   
	  if(!$conexao){
	    die ('Não foi possível conectar-se ao banco de dados');
	  }
   
?>