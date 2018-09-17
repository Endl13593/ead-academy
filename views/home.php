<h1 style="margin-left: 10px; margin-top: 10px;">Meus Cursos</h1>
<hr>

<?php foreach ($cursos as $curso) : ?>
<a href="<?= BASE; ?>cursos/entrar/<?= $curso['id_curso'] ?>">
	<div class="cursoitem">
		<img src="<?= BASE; ?>assets/images/<?= $curso['imagem']; ?>" class="rounded mx-auto d-block" border="0" width="290" height="170">
		<strong><?= $curso['nome'] ?></strong><br>
		<?= $curso['descricao'] ?>
	</div>
</a>
<?php endforeach; ?>