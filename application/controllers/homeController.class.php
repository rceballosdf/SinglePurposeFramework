<?php
class homeController extends Controller{
    function __construct(){
        parent::__construct();
    }
    function indexAction(){
        if(!$this->isAuthenticated()){
            $this->redirectToAction('login','account');
        }
        $this->setContent(function(){
            var_dump($this->parameters); 
        });
        $this->view('layout.php','shared');
    }
    function autosAction(){
        $this->view('layout.php','shared');
    }
}
?>