<?php
class AutoCodeBL extends baseBL{
    private $DAL;
    public  function __construct(){
        parent::__construct();
        $this->DAL = $this->loader->DAL("AutoCodeDAL");
    }
    public function GetTables(){
        return $this->DAL->getTables();
    }
    public function GetColumns($table){
        return $this->DAL->getColumns($table);
    }
    public function GetPrimaryKey($table){
        return $this->DAL->getPrimaryKey($table);
    }
}
?>