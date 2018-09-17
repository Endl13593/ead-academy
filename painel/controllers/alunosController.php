<?php
class alunosController extends Controller
{
	public function __construct()
	{
		$usuarios = new Usuario();
		if (!$usuarios->isLogged()) {
			header("Location: ".BASE."login");
			exit;
		}
	}

	public function index()
	{
		$data = array(
			'alunos' => array()
		);
		$alunos = new Aluno();
		$data['alunos'] = $alunos->getAlunos();

		$this->loadTemplate('alunos', $data);
	}

	public function adicionar()
    {
    	$data = array();

    	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    		$nome = addslashes($_POST['nome']);
    		$email = addslashes($_POST['email']);
    		$senha = md5($_POST['senha']);

    		$alunos = new Aluno();
			$alunos->adicionarAluno($nome, $email, $senha);
			
			header("Location: ".BASE."alunos");

    	}

    	$this->loadTemplate('aluno_add', $data);
    }

    public function editar($id)
    {
    	$data = array(
			'aluno' => array()
    	);

   		$aluno = new Aluno();

   		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
   			$nome = addslashes($_POST['nome']);
   			$email = addslashes($_POST['email']);
    		$senha = md5($_POST['senha']);
    		$cursos = $_POST['cursos'];

   			$aluno->editarAluno($nome, $email, $senha, $id);
   			$aluno->removerRelacionamento($id);
   			foreach ($cursos as $curso) {
   				$aluno->adicionarRelacionamento($curso, $id);
   			}
   		}
   		$cursos = new Curso();
    	$data['aluno'] = $aluno->getAluno($id);
    	$data['cursos'] = $cursos->getCursos();
    	$data['inscrito'] = $cursos->getCursosInscritos($id);

    	$this->loadTemplate('aluno_edit', $data);
    }

	public function excluir($id)
    {	
    	$alunos = new Aluno();
    	$alunos->excluirAluno($id);
    	header("Location: ".BASE."alunos");
    }
}