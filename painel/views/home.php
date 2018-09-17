<h1 style="margin-top: 10px;">Cursos</h1>
<hr>
<a href="<?= BASE; ?>home/adicionar" class="btn btn-success btn-sm" style="margin-bottom: 15px;">Adicionar Curso</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th width="150px">Imagem</th>
			<th>Nome</th>
			<th style="text-align: center;" width="150px">Qt. de Alunos</th>
			<th width="200px">Ações</th>
		</tr>
	</thead>
	<?php foreach ($cursos as $curso) : ?>
	<tbody>
		<tr>
			<td><img src="<?= BASE; ?>../assets/images/<?= $curso['imagem']; ?>" class="rounded" border="0" width="115" height="70"></td>
			<td><?= $curso['nome']; ?></td>
			<td style="text-align: center;"><?= $curso['qtalunos']; ?></td>
			<td>
				<a href="<?= BASE; ?>home/editar/<?= $curso['id']; ?>" class="btn btn-primary btn-sm">Editar</a> - 
				<a href="<?= BASE; ?>home/excluir/<?= $curso['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
			</td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>