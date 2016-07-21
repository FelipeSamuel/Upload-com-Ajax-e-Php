<!DOCTYPE HTM>
<html>
	<head>
		<title>Upload</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.porcentagem').hide();
				$("#btnEnviar").click(function(){
					$('#formUpload').ajaxForm({
						uploadProgress: function(event, position, total, percentComplete){
							var tam_file = total/1000000;
							if(tam_file <= 1024){
								$(".porcentagem").show();
								$(".porcentagem span.valor").css({
									'width': percentComplete+'%'
								});
								$(".porcentagem span.valor p").html(percentComplete+"%");
							}else{
								location.href("index.php");
							}
						},
						success: function(data){
							$(".porcentagem span.valor").css({
								"background": "#00cc00"
							});
							$(".mensagens p").html(data.msg);
						},
						error: function(){
							$(".mensagens p").html("Não foi possível enviar seu arquivo!");
						},
						dataType: 'json',
						url: 'upload_file.php',
						resetForm: true
					}).submit();
				});
			});
		</script>
	</head>
	<body>
		<div id="global">
			<div class="porcentagem">
				<span class="valor"><p></p></span>
			</div>
			
			<div class="mensagens"><p>Envie seu arquivo</p></div>
			<div id="formulario">
				<form action="" method="post" enctype="multipart/form-data" id="formUpload">
					<label>Escolha o arquivo</label>
					<input type="file" name="arquivo">
				
					<input type="button" id="btnEnviar" value="Enviar Arquivos">
				</form>
			</div>
			<div style="clear:both;"></div>
		</div><!--global-->
	</body>
</html>