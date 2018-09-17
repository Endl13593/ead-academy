<h1 style="margin-top: 10px;">Editar Aula</h1>
<fieldset>
	<form method="POST">
		<h6>Título da aula:</h6>
		<input type="text" name="nome" value="<?= $aula['nome']; ?>" class="col-md-4 form-control"><br><br>
		<h6>Descrição da aula:</h6>
		<textarea name="descricao" class="form-control col-6"><?= $aula['descricao'] ?></textarea>
		<h6 style="margin-top: 10px;">URL do vídeo:</h6>
		<input type="text" name="url" value="<?= $aula['url']; ?>" class="col-md-4 form-control"><br><br>

		<input type="submit" value="Salvar" class="btn btn-info">
	</form>
</fieldset>