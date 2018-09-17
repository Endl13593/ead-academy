<?php
class homeController extends Controller
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
    		'cursos' => array()
    	);

    	$cursos = new Curso();
    	$data['cursos'] = $cursos->getCursos(); 
    	
        $this->loadTemplate('home', $data);
    }

    public function adicionar()
    {
    	$data = array();

    	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    		$nome = addslashes($_POST['nome']);
    		$descricao = addslashes($_POST['descricao']);
    		$imagem = $_FILES['imagem'];

    		if (!empty($imagem['tmp_name'])) {
    			$md5name = md5(time().rand(0,9999)).'.jpg';
    			$types = array('image/jpeg', 'image/jpg', 'image/png');

    			if (in_array($imagem['type'], $types)) {
    				move_uploaded_file($imagem['tmp_name'], "../assets/images/".$md5name);

    				$cursos = new Curso();
    				$cursos->adicionarCurso($nome, $descricao, $md5name);
    				
    				header("Location: ".BASE);
    			}
    		}

    	}

    	$this->loadTemplate('curso_add', $data);
    }

    public function editar($id)
    {
    	$data = array(
			'curso' => array(),
			'modulos' => array()
    	);

   		$curso = new Curso();
   		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
   			$nome = addslashes($_POST['nome']);
   			$descricao = addslashes($_POST['descricao']);
   			$imagem = $_FILES['imagem'];

   			$curso->editarCurso($nome, $descricao, $id);

   			if (!empty($imagem['tmp_name'])) {
   				$md5name = md5(time().rand(0,9999)).'.jpg';
    			$types = array('image/jpeg', 'image/jpg', 'image/png');

    			if (in_array($imagem['type'], $types)) {
    				move_uploaded_file($imagem['tmp_name'], "../assets/images/".$md5name);
    				$curso->editarImagem($md5name, $id);
    			}
   			}
   		}
   		$modulos = new Modulo();
   		// Usuário adicionou novo módulo
   		if (isset($_POST['modulo']) && !empty($_POST['modulo'])) {
   			$modulo = utf8_decode(addslashes($_POST['modulo']));
   			$modulos->addModulo($modulo, $id);
   		}

   		//Usuário adicionou uma aula nova
   		if (isset($_POST['aula']) && !empty($_POST['aula'])) {
   			$aula = addslashes($_POST['aula']);
   			$moduloaula = addslashes($_POST['moduloaula']);
   			$tipo = addslashes($_POST['tipo']);

   			$aulas = new Aula();
   			$aulas->addAula($moduloaula, $id, $aula, $tipo);
   		}

    	$data['curso'] = $curso->getCurso($id);
    	$data['modulos'] = $modulos->getModulos($id);

    	$this->loadTemplate('curso_edit', $data);
    }

    public function excluir($id)
    {	
    	$cursos = new Curso();
    	$cursos->excluirCurso($id);
    	header("Location: ".BASE);
    }

    public function del_modulo($id)
    {
    	if (!empty($id)) {
    		$id = addslashes($id);
    		$modulos = new Modulo();
    		$id_curso = $modulos->deleteModulo($id);
    		header("Location: ".BASE."home/editar/".$id_curso);
    		exit;
    	}
    	header("Location: ".BASE);
    }

    public function edit_modulo($id)
    {
    	$data = array();

    	$modulos = new Modulo();

    	if (isset($_POST['modulo']) && !empty($_POST['modulo'])) {
    		$nome = utf8_decode(addslashes($_POST['modulo']));
    		$id_curso = $modulos->updateModulo($nome, $id);
    		header("Location: ".BASE."home/editar/".$id_curso);
    		exit;
    	}

    	$data['modulo'] = $modulos->getModulo($id);

    	$this->loadTemplate('curso_edit_modulo', $data);
    }

    public function edit_aula($id)
    {
    	$data = array();
    	$view = 'curso_edit_aula_video';
    	$aulas = new Aula();

    	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    		$nome = addslashes($_POST['nome']);
    		$descricao = addslashes($_POST['descricao']);
    		$url = addslashes($_POST['url']);

    		$id_curso = $aulas->updateVideoAula($id, $nome, $descricao, $url);

    		header("Location: ".BASE."home/editar/".$id_curso);
    	}

    	if (isset($_POST['pergunta']) && !empty($_POST['pergunta'])) {
    		$pergunta = addslashes($_POST['pergunta']);
    		$opcao1 = addslashes($_POST['opcao1']);
    		$opcao2 = addslashes($_POST['opcao2']);
    		$opcao3 = addslashes($_POST['opcao3']);
    		$opcao4 = addslashes($_POST['opcao4']);
    		$resposta = addslashes($_POST['resposta']);

    		$id_curso = $aulas->updateQuestionarioAula($id, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $resposta);

    		header("Location: ".BASE."home/editar/".$id_curso);
    	}

    	$data['aula'] = $aulas->getAula($id);

    	if ($data['aula']['tipo'] == 'video') {
    		$view = 'curso_edit_aula_video';
    	} else {
    		$view = 'curso_edit_aula_poll';
    	}

    	$this->loadTemplate($view, $data);
    }

    public function del_aula($id)
    {
    	if (!empty($id)) {
    		$id = addslashes($id);
    		$aulas = new Aula();
    		$id_curso = $aulas->deleteAula($id);
    		header("Location: ".BASE."home/editar/".$id_curso);
    		exit;
    	}
    	header("Location: ".BASE);
    }

}