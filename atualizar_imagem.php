<?php
	if (isset($_POST)) {
		if(isset($_FILES['imagem'])) {

			$largura_permitida = 800;
			$altura_permitida = 600;

			list($largura, $altura) = getimagesize($_FILES['imagem']['tmp_name']);

			$extensao = substr($_FILES['imagem']['name'],-4);
			
			if(strtolower($extensao) == '.jpg' || strtolower($extensao) == 'jpeg') {
				if($largura == $largura_permitida && $altura == $altura_permitida) {
					move_uploaded_file($_FILES['imagem']['tmp_name'], 'quebracabeca.jpg');
					include 'gerar_quebracabeca.php';
					header('Location: mostrar.php');
				}
				else {
					echo '<h3>Erro: O tamanho da imagem precisa ser 800x600</h3>';
				}
			}
			else {
				echo '<h3>Erro: A extensão da imagem precisa ser .jpg</h3>';
			}
		}
	}
?>
<html>
	<head>
		<title>Atualizar Imagem</title>
	</head>
	<body>
		<form action="atualizar_imagem.php" method="POST" enctype="multipart/form-data">
			Enviar nova imagem para atualizar (Tamanho válido 800x600):
			<br />
			<input name="imagem" type="file" />
			<br />
			<input type="submit" />
		</form>
	</body>
</html>