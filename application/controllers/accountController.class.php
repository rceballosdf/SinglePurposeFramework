<?php
class accountController extends Controller{

    public $errorMessage="";

    function __construct(){
        parent::__construct();
    }
    function indexAction(){
        if(!$this->isAuthenticated()){
            $this->redirectToAction('login','account');
        }
        var_dump($this->parameters);
    }
    function loginAction(){
        if(!empty($_POST)){
            if(isset($_POST['email']) && isset($_POST['email'])){    
                if (!empty($_POST['email'] && !empty($_POST['password'] )))
                {
                    $email = $_POST['email'];
                    $passwrord = $_POST['password'];        
                    if($this->usuariosBL->Authenticate($email,$passwrord))
                    {
                        $this->redirectToAction('index','home');
                        die();
                    }
                    else
                    {
                        $this->errorMessage="Verifique sus credenciales";
                    }
                }
            }
        }
        $this->view('login.php');
    }
    function logOutAction(){
        $this->usuariosBL->logOut();
        $this->redirectToAction('index','home');
    }
}
?>