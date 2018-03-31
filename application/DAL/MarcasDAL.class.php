<?php
include 'db.php';
class MarcasDAL {
    /// Queries
    private $query_SelectALL = "SELECT * FROM Marca";
    private $query_SelectById = "SELECT * FROM Marca where Id =:Id";

    private $command_insert = "insert into Marca(nombre) values(:nombre);";
    private $command_update = "update Marca set nombre = :nombre Where Id=:Id;";
    private $command_delete = "delete Marca Where Id=:Id;";
    //DataAccess Object
    private $DB;
    /// Constructor
    function __construct (){
        $this->DB = new Db(DBHost, DBName, DBUser, DBPassword);
    }    
    public function selectAll(){
        return $this->DB->query($this->query_SelectALL);
    }
    public function selectById($Id){
        $parameters = array('Id'=>$Id);
        return $this->DB->query($this->query_SelectById, $parameters)[0];
    }
    public function Insert($nombre){
        $result;
        $parameters = array('nombre'=>$nombre);        
        $result->count = $this->DB->query($this->command_insert,$parameters);
        $result->Id = $this->DB->lastInsertId();
        return $result;
    }
    public function Update($id, $nombre){
        $parameters = array('nombre'=>$nombre, 'Id'=>$id);
        $this->DB->query($this->command_update,$parameters);
    }
    public function Delete($id){
        $parameters = array('Id'=>$id);
        $this->DB->query($this->command_delete,$parameters);
    }
}
?>