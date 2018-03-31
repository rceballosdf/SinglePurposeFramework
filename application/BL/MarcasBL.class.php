<?php
class MarcasBL extends baseBL{
    private $marcasDAL;

    function __construct (){
        parent::__construct();
        $this->marcasDAL = $this->loader->DAL("MarcasDAL");
        $this->loader->library('underscore');
    }
    public function getAllMarcas(){

        $result = $this->marcasDAL->selectAll();    

        return $result;
    }
    public function getMarcaById($Id){
        return $this->marcasDAL->selectById($Id);
    }
    public function saveMarca($item){
        if($item->Id>0){
            return $this->updateMarca($item);
        }
        else{
            return $this->createMarca($item);
        }
    }
    public function createMarca($item){
        $this->marcasDAL->Insert($item->Nombre);
    }
    public function updateMarca($item){
        $this->marcasDAL->Update($item->Id,$item->Nombre);
    }
    public function deleteMarca($Id){

    }
}
?>