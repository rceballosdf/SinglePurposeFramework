<?php

include 'db.php';

class UsuariosDAL {

    /// Queries
    private $query_SelectByEmailAndPassword = "SELECT * FROM Usuario Where correo =:email and password=:pass";
    private $query_selectByEmail = 'SELECT 1 FROM Usuario where correo =:email';
    private $query_selectByEmailAndId = 'SELECT 1 FROM Usuario where correo =:email AND Id =:Id';
    private $query_selectIsRoot = 'SELECT * FROM Usuario Where correo =:email and password=:pass and IsRoot =1';
    private $query_selectALL = 'SELECT * FROM Usuario';

    //DataAccess Object
    private $DB;

    /// Constructor
    function __construct (){
        $this->DB = new Db(DBHost, DBName, DBUser, DBPassword);
    }

    
    public function SelectByEmailAndPassword($email, $pass){
        
        $parameters = array('email'=> $email, 'pass'=>$pass);

        return $this->DB->query($this->query_SelectByEmailAndPassword,$parameters);
    }

    public function ExiststEmail($email){

        $parameters = array('email'=>$email);

        return $this->DB->query($query_SelectByEmail, $parameters);
    }
    public function ExistsEmailAndId($email, $Id){
        $parameters = array('email'=>$email, 'Id'=>$Id);
        
        return $this->DB->query($this->query_selectByEmailAndId,$parameters);
    }
}

?>