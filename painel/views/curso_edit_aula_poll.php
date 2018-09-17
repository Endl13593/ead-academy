<h1 style="margin-top: 10px;">Editar Aula</h1>
<fieldset>
	<form method="POST">
		<h6>Pergunta:</h6>
		<input type="text" name="pergunta" value="<?= $aula['pergunta']; ?>" class="col-md-4 form-control"><br><br>
		<h6>Opção 1:</h6>
		<input type="text" name="opcao1" value="<?= $aula['opcao1']; ?>" class="col-md-4 form-control"><br><br>
		<h6>Opção 2:</h6>
		<input type="text" name="opcao2" value="<?= $aula['opcao2']; ?>" class="col-md-4 form-control"><br><br>
		<h6>Opção 3:</h6>
		<input type="text" name="opcao3" value="<?= $aula['opcao3']; ?>" class="col-md-4 form-control"><br><br>
		<h6>Opção 4:</h6>
		<input type="text" name="opcao4" value="<?= $aula['opcao4']; ?>" class="col-md-4 form-control"><br><br>
		<h6>Resposta:</h6>
		<select name="resposta" class="col-md-4 form-control">
			<option value="1" <?= ($aula['resposta']=='1')?'selected="selected"':''; ?>>Opção 1</option>
			<option value="2" <?= ($aula['resposta']=='2')?'selected="selected"':''; ?>>Opção 2</option>
			<option value="3" <?= ($aula['resposta']=='3')?'selected="selected"':''; ?>>Opção 3</option>
			<option value="4" <?= ($aula['resposta']=='4')?'selected="selected"':''; ?>>Opção 4</option>
		</select><br>
		
		<input type="submit" value="Salvar" class="btn btn-info">
	</form>
</fieldset>