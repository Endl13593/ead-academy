<h1 style="margin-top: 10px;">Editar Módulo</h1>
<fieldset>
	<form method="POST">
		<h6>Nome do Módulo:</h6>
		<input type="text" name="modulo" value="<?= utf8_encode($modulo['nome']); ?>" class="col-md-4 form-control" placeholder="Nome do Módulo">
		<input type="submit" value="Salvar" class="btn btn-info">
	</form>
</fieldset>