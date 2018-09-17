<?php
class ajaxController extends Controller
{
	public function __construct()
	{
		$alunos = new Aluno();
		if (!$alunos->isLogged()) {
			header("Location: ".BASE."login");
			exit;
		}
	}

	public function marcar_assistido($id)
	{
		$aulas = new Aula();
		$aulas->marcarAssistido($id);
	}
}