<?php
class loginController extends Controller
{

    public function index()
    {    
    	$data = array('aviso'=>'');

    	if (isset($_POST['email']) && !empty($_POST['email'])) {
    		$email = addslashes($_POST['email']);
    		$senha = md5($_POST['senha']);

    		$usuarios = new Usuario();
    		if ($usuarios->fazerLogin($email, $senha)) {
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
    	unset($_SESSION['lgadmin']);
    	header("Location: ".BASE."login");
    	exit;
    }

}