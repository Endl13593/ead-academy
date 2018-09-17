<?php
class cursosController extends Controller
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
    	header("Location: ".BASE);
    }

    public function entrar($id)
    {
        $array = array(
            'info'    => array(),
            'curso'   => array(),
            'modulos' => array()
        );
        $alunos = new Aluno();
        $alunos->setAluno($_SESSION['lgaluno']);
        $data['info'] = $alunos;

        if ($alunos->isInscrito($id)) {
            $curso = new Curso();
            $curso->setCurso($id);
            $data['curso'] = $curso;

            $modulos = new Modulo();
            $data['modulos'] = $modulos->getModulos($id);
            $data['aulas_assistidas'] = $alunos->getNumAulasAssistidas($id);
            $data['total_aulas'] = $curso->getTotalAulas();

            $this->loadTemplate('curso_entrar', $data);
        } else {
            header("Location: ".BASE);
        }
    }

    public function aula($id_aula)
    {
        $array = array(
            'info'    => array(),
            'curso'   => array(),
            'modulos' => array(),
            'aula_info'    => array()
        );
        $alunos = new Aluno();
        $alunos->setAluno($_SESSION['lgaluno']);
        $data['info'] = $alunos;

        $aula = new Aula();
        $id = $aula->getCursoDeAula($id_aula);

        if ($alunos->isInscrito($id)) {
            $curso = new Curso();
            $curso->setCurso($id);
            $data['curso'] = $curso;

            $modulos = new Modulo();
            $data['modulos'] = $modulos->getModulos($id);
            $data['aulas_assistidas'] = $alunos->getNumAulasAssistidas($id);
            $data['total_aulas'] = $curso->getTotalAulas();
            $data['aula_info'] = $aula->getAula($id_aula);

            if ($data['aula_info']['tipo'] == 'video') {
                $view = 'curso_aula_video';
            } else {
                $view = 'curso_aula_poll';
                if (!isset($_SESSION['poll'.$id_aula])) {
                    $_SESSION['poll'.$id_aula] = 1;
                }
            }

            if (isset($_POST['duvida']) && !empty($_POST['duvida'])) {
                $duvida = addslashes($_POST['duvida']);

                $aula->setDuvida($duvida, $alunos->getId());
            }

            if (isset($_POST['opcao']) && !empty($_POST['opcao'])) {
                $opcao = addslashes($_POST['opcao']);
                if ($opcao == $data['aula_info']['resposta']) {
                    $data['resposta'] = true;
                    $aula->marcarAssistido($id_aula);
                } else {
                    $data['resposta'] = false;
                }

                $_SESSION['poll'.$id_aula]++;
            }

            $this->loadTemplate($view, $data);
        } else {
            header("Location: ".BASE);
        }
    }

}