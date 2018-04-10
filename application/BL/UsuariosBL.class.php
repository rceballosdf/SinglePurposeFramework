<?php
class UsuariosBL extends baseBL{
    private $DAL;

    function __construct (){
        parent::__construct();
        $this->DAL = $this->loader->DAL("UsuariosDAL");
    }
    public function ValidateUserPassword($email, $pass){

        $result = $this->DAL->SelectByEmailAndPassword($email, $pass);    

        return count($result)>=1;
    }
    public function Authenticate($email, $pass){
        //TODO: Pendiente validar formato y texto
        $exists = false;
        if(isset($_SESSION['usuarioId'])){
            $usuarioId = $_SESSION['usuarioId'];
            if(isset($usuarioId) && $usuarioId>0){
                $exists = true;
            }
        }
        else{
            if($this->ValidateUserPassword($email, $pass)){
                $usuario = $this->DAL->SelectByEmailAndPassword($email, $pass);

                $_SESSION['usuarioId'] = $usuario[0]['Id'];

                $exists = true;
            }
        }
        return $exists;
    }
    public function IsAuthenticated(){
        
        return (isset($_SESSION['usuarioId']) && $_SESSION['usuarioId']>0 );
    }
    public function GetCurrentUser(){
        $usuarioId;
        if($this->IsAuthenticated()){
            $usuarioId = $_SESSION['usuarioId'];
        }
        else{
            return null;
        }
        return $this->GetUserById($usuarioId);
    }
    protected function GetUserById($Id){
        return $this->DAL->GetUserById($Id);
    }
    public function logOut(){
        $_SESSION['usuarioId'] = null;
    }
}
?>