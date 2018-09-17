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
	
</div>