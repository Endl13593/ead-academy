<div class="cursoinfo">
	<img src="<?= BASE; ?>assets/images/<?= $curso->getImagem(); ?>" height="60">
	<h4><?= $curso->getNome(); ?></h4>
	<?= $curso->getDescricao(); ?><br>
	<?= $aulas_assistidas.' / '.$total_aulas.' ('.(($aulas_assistidas/$total_aulas)*100).'%)'; ?>
</div>

<div class="curso_left">
	<?php foreach ($modulos as $modulo) : ?>
		<div class="modulo"><?= utf8_encode($modulo['nome']); ?></div>
		<?php foreach ($modulo['aulas'] as $aula) : ?>
			<a href="<?= BASE; ?>cursos/aula/<?= $aula['id']; ?>"><div class="aula"><?= $aula['nome']; ?>
				<?php if ($aula['assistido'] === true) : ?>
					<img style="float: right;margin-right: 10px;margin-top: 7px;" src="<?= BASE; ?>assets/images/icon.png" width="15" height="15">
				<?php endif; ?>
			</div></a>
		<?php endforeach; ?>
	<?php endforeach; ?>
</div>
<div class="curso_right">
	<h3 style="margin-left: 10px; margin-top: 10px;">Questionário</h3>
	<hr>
	<?php
	if (isset($resposta)) {
		if ($resposta === true) : ?>
			<div class="alert alert-success">RESPOSTA CORRETA!</div>
			<?php exit; ?>
		<?php else : ?>
			<div class="alert alert-danger">RESPOSTA INCORRETA!</div>
		<?php endif;
	}
	?>
	<?php if ($_SESSION['poll'.$aula_info['id_aula']] > 2) : ?>
		<div class="alert alert-warning">Questionário finalizado!</div>
	<?php else : ?>
		Tentativa: <?= $_SESSION['poll'.$aula_info['id_aula']].' de 2'; ?>
		<h5><?= $aula_info['pergunta']; ?></h5><br>
		<form method="POST">
			<input type="radio" name="opcao" value="1" id="opcao1">
			<label for="opcao1"><?= $aula_info['opcao1']; ?></label><br>

			<input type="radio" name="opcao" value="2" id="opcao2">
			<label for="opcao2"><?= $aula_info['opcao2']; ?></label><br>

			<input type="radio" name="opcao" value="3" id="opcao3">
			<label for="opcao3"><?= $aula_info['opcao3']; ?></label><br>

			<input type="radio" name="opcao" value="4" id="opcao4">
			<label for="opcao4"><?= $aula_info['opcao4']; ?></label><br><br>

			<input type="submit" value="Enviar Resposta" class="btn btn-success">
		</form>
	<?php endif; ?>
	
</div>