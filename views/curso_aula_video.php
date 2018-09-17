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
	<h3 style="margin-left: 10px; margin-top: 10px;">Vídeo - <?= $aula_info['nome']; ?></h3>
	<hr>
	<iframe id="video" style="width:100%" frameborder="0" src="//player.vimeo.com/video/<?= $aula_info['url']; ?>"></iframe><br>
	<?= $aula_info['descricao']; ?><br>
	<?php if ($aula_info['assistido'] == '1') : ?>
	<div class="alert alert-success">Esta aula já foi assistida!</div>
	<?php else : ?>
	<button onclick="marcarAssistido(this)" data-id="<?= $aula_info['id']; ?>" class="btn btn-success btn-sm">Marcar como assistido</button>
	<?php endif; ?>
	<hr>
	<h5>Dúvidas? Envie sua pergunta!</h5>
	<form method="POST" class="form-duvida">
		<textarea name="duvida"></textarea><br>

		<input type="submit" value="Enviar Dúvida" class="btn btn-primary"><br><br>
	</form>
</div>