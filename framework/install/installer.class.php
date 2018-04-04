<?php
class installer extends Controller{

    private $showTablesQuery='show tables';
    public function __construct(){
        $this->loader->library('underscore');
    }
    public function InstallAction(){

    }
}
?>