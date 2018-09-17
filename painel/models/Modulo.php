<?php
class Modulo extends Model
{

	public function getModulos($id_curso)
	{
		$array = array();

		$sql = "SELECT * FROM modulos WHERE id_curso = '$id_curso'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

			$aulas = new Aula();

			foreach ($array as $mChave => $mDados) {
				$array[$mChave]['aulas'] = $aulas->getAulasDoModulo($mDados['id']);
			}
		}

		return $array;
	}

	public function getModulo($id)
	{
		$array = array();

		$sql = "SELECT * FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function addModulo($modulo, $id_curso)
	{
		$sql = "INSERT INTO modulos SET nome = '$modulo', id_curso = '$id_curso'";
		$this->db->query($sql);
	}

	public function deleteModulo($id)
	{
		$sql = "SELECT id_curso FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("DELETE FROM modulos WHERE id = '$id'");

			return $sql['id_curso'];
		}
	}

	public function updateModulo($nome, $id)
	{
		$sql = "SELECT id_curso FROM modulos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$this->db->query("UPDATE modulos SET nome = '$nome' WHERE id = '$id'");

			return $sql['id_curso'];
		}
	}

}