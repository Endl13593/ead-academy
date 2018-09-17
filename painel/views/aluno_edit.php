<h1 style="margin-top: 10px;">Editar Aluno</h1>
<hr>
<form method="POST">

	Nome do aluno:<br>
	<input type="text" name="nome" class="form-control col-6" value="<?= $aluno['nome'] ?>"><br>

	E-mail do aluno:<br>
	<input type="email" name="email" class="form-control col-6" value="<?= $aluno['email'] ?>"><br>

	Senha:<br>
	<input type="password" name="senha" class="form-control col-6" value="<?= $aluno['senha'] ?>"><br>

	Cursos inscritos: (Segure CTRL para selecionar outros cursos)<br>
	<select name="cursos[]" class="form-control col-6" style="height: 170px;" multiple>
		<?php foreach ($cursos as $curso) : ?>
			<option value="<?= $curso['id']; ?>" <?php
			if (in_array($curso['id'], $inscrito)) {
				echo 'selected="selected"';
			}
			?>><?= $curso['nome']; ?></option>
		<?php endforeach; ?>
	</select><br>

	<input type="submit" value="Salvar" class="btn btn-success">
	
</form>

<hr>