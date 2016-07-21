<?php 
	$arquivo = $_FILES['arquivo'];
	
	$retorno = array();
	if(move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name'])):
		$retorno['msg'] = 'Arquivo enviado com sucesso!';
		
	else:
		$retorno['msg'] = 'Não foi possivel enviar o arquivo!';
	endif;
	
	echo json_encode($retorno);
?>