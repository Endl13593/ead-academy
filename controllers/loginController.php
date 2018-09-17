<?php
class loginController extends Controller
{

    public function index()
    {    
    	$data = array('aviso'=>'');

    	if (isset($_POST['email']) && !empty($_POST['email'])) {
    		$email = addslashes($_POST['email']);
    		$senha = md5($_POST['senha']);

    		$alunos = new Aluno();
    		if ($alunos->fazerLogin($email, $senha)) {
    			header("Location: ".BASE);
    			exit;
    		} else {
    			$data['aviso'] = 'Usuário ou senha inválidos!';
    		}
    	}
    	
        $this->loadView('login', $data);
    }

    public function logout()
    {
    	unset($_SESSION['lgaluno']);
    	header("Location: ".BASE."login");
    	exit;
    }

}