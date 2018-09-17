<?php
class Aluno extends Model
{

	public function getAlunos()
	{
		$array = array();

		$sql = "
		SELECT
			*,
			(select count(*) from aluno_curso where aluno_curso.id_aluno = alunos.id) as qtcursos
		FROM
			alunos";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getAluno($id)
	{
		$array = array();

		$sql = "SELECT * FROM alunos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function adicionarAluno($nome, $email, $senha)
	{
		$sql = "INSERT INTO alunos SET nome = '$nome', email = '$email', senha = '$senha'";
		$this->db->query($sql);
	}

	public function editarAluno($nome, $email, $senha, $id)
	{
		$sql = "UPDATE alunos SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
		$this->db->query($sql);
	}

	public function removerRelacionamento($id)
	{
		$sql = "DELETE FROM aluno_curso WHERE id_aluno = '$id'";
		$this->db->query($sql);
	}

	public function adicionarRelacionamento($id_curso, $id_aluno)
	{
		$sql = "INSERT INTO aluno_curso SET id_curso = '$id_curso', id_aluno = '$id_aluno'";
		$this->db->query($sql);
	}

	public function excluirAluno($id)
	{
    	$sql = "DELETE FROM aluno_curso WHERE id_aluno = '$id'";
    	$this->db->query($sql);

    	$sql = "DELETE FROM alunos WHERE id = '$id'";
    	$this->db->query($sql);
	}

}