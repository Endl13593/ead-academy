<h1 style="margin-top: 10px;">Alunos</h1>
<hr>
<a href="<?= BASE; ?>alunos/adicionar" class="btn btn-success btn-sm" style="margin-bottom: 15px;">Adicionar Aluno</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Nome</th>
			<th>E-mail</th>
			<th style="text-align: center;" width="150px">Qt. de Cursos</th>
			<th width="200px">Ações</th>
		</tr>
	</thead>
	<?php foreach ($alunos as $aluno) : ?>
	<tbody>
		<tr>
			<td><?= $aluno['nome']; ?></td>
			<td><?= $aluno['email']; ?></td>
			<td style="text-align: center;"><?= $aluno['qtcursos']; ?></td>
			<td>
				<a href="<?= BASE; ?>alunos/editar/<?= $aluno['id']; ?>" class="btn btn-primary btn-sm">Editar</a> - 
				<a href="<?= BASE; ?>alunos/excluir/<?= $aluno['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
			</td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>