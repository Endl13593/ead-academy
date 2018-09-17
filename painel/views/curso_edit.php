<h1 style="margin-top: 10px;">Editar Curso</h1>
<hr>
<form method="POST" enctype="multipart/form-data">

	Nome do curso:<br>
	<input type="text" name="nome" class="form-control col-6" value="<?= $curso['nome'] ?>"><br>

	Descrição:<br>
	<textarea name="descricao" class="form-control col-6"><?= $curso['descricao'] ?></textarea><br>

	Imagem:<br>
	<input type="file" name="imagem"><br>
	<img style="margin-top: 10px;" src="<?= BASE; ?>../assets/images/<?= $curso['imagem']; ?>" class="rounded" border="0" width="115" height="70"><br><br>

	<input type="submit" value="Salvar" class="btn btn-success">
	
</form>

<hr>

<h3>Aulas do Curso de <?= $curso['nome'] ?></h3>

<fieldset>
	<legend>Adicionar Módulo Novo</legend>
	<form method="POST">
		<input type="text" name="modulo" class="col-md-4 form-control" placeholder="Nome do Módulo">
		<input type="submit" value="Adicionar Módulo" class="btn btn-info">
	</form>
</fieldset>
<br>
<fieldset>
	<legend>Adicionar Aula Nova</legend>
	<form method="POST">
		<input type="text" name="aula" class="col-md-4 form-control" placeholder="Título da Aula">
		<select name="moduloaula" class="col-md-4 form-control">
			<option value="">Selecione o Módulo</option>
			<?php foreach ($modulos as $modulo) : ?>
				<option value="<?= $modulo['id']; ?>"><?= utf8_encode($modulo['nome']); ?></option>
			<?php endforeach; ?>
		</select><br>
		<select name="tipo" class="col-md-4 form-control">
			<option>Selecione o tipo</option>
			<option value="video">Vídeo</option>
			<option value="poll">Questionário</option>
		</select>
		<input style="margin-top: 5px;" type="submit" value="Adicionar Aula" class="btn btn-info">
	</form>
</fieldset>

<?php foreach ($modulos as $modulo) : ?>
<span><h5><?= utf8_encode($modulo['nome']); ?> - <a href="<?= BASE; ?>home/edit_modulo/<?= $modulo['id']; ?>"><img src="<?= BASE; ?>assets/images/edit.png" width="25" title="Editar"></a> - <a href="<?= BASE; ?>home/del_modulo/<?= $modulo['id']; ?>"><img src="<?= BASE; ?>assets/images/delete.png" width="25" title="Excluir"></a></h5></span>

<?php foreach ($modulo['aulas'] as $aula) : ?>
<h6 style="margin-left: 20px;"><?= $aula['nome']; ?> - <a href="<?= BASE; ?>home/edit_aula/<?= $aula['id']; ?>"><img src="<?= BASE; ?>assets/images/edit.png" width="20" title="Editar"></a> - <a href="<?= BASE; ?>home/del_aula/<?= $aula['id']; ?>"><img src="<?= BASE; ?>assets/images/delete.png" width="20" title="Excluir"></a></h6>
<?php endforeach; ?>

<?php endforeach; ?>
<br>