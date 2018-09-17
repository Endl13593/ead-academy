<?php
class homeController extends Controller
{
	public function __construct()
	{
		$alunos = new Aluno();
		if (!$alunos->isLogged()) {
			header("Location: ".BASE."login");
			exit;
		}
	}

    public function index()
    {    
    	$data = array(
    		'info' => array(),
    		'cursos' => array()
    	);

    	$alunos = new Aluno();
    	$alunos->setAluno($_SESSION['lgaluno']);
    	$data['info'] = $alunos;

    	$cursos = new Curso();
    	$data['cursos'] = $cursos->getCursosDoAluno($alunos->getId());
    	
        $this->loadTemplate('home', $data);
    }

}