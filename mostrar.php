<?php
	ini_set('display_errors', true);
	
	if(!isset($_GET['mostrar_solucao'])) {
		$dir = 'imagens';
		$pastas = array('..', '.');
		$arquivos = array_diff(scandir($dir), $pastas);

		shuffle($arquivos);
	}

?>
<html>
	<head>
		<style>
			*{padding:0; margin:0; border:0;}
			table {border:0; border-spacing: 10px;}
			table tr td{padding:0; margin:0}
			.links{padding: 0 10px;}
		</style>
	</head>
	<body>
		<table>
			<?php for($linha=1; $linha<=6; $linha++) : ?>
			<tr>
				<?php for($coluna=1; $coluna<=8; $coluna++) : ?>
					<?php if(!isset($_GET['mostrar_solucao'])) : ?>
						<td><img src="imagens/<?php echo array_shift($arquivos); ?>" /></td>
					<?php else : ?>
						<td><img src="imagens/<?php echo ($linha*8)-8+$coluna ?>.jpg" /></td>
					<?php endif; ?>
				<?php endfor; ?>
			</tr>
			<?php endfor; ?>
		</table>
		<div class="links">
			<a href="atualizar_imagem.php">Alterar imagem</a> | <a href="mostrar.php">Embaralhar</a> | <a href="mostrar.php?mostrar_solucao=1">Mostrar solucionado</a>
		</div>
	</body>
</html>