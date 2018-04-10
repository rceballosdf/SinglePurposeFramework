<?php
class CodeController extends Controller{

    public $ViewModel;

    protected $CodeBL;
    function __construct(){
        parent::__construct();
        $this->CodeBL = $this->loader->BL('AutoCodeBL');
        $this->ViewModel = array();
        $this->showFooter=false;
    }
    function indexAction(){
        if(!$this->isAuthenticated()){
            $this->redirectToAction('login','account');
        }
        
        $this->setContent(function(){
            $this->view('indexView.php','code');
        });
        
        $this->addScript(function(){
            $this->view('pTableDataTable.php');
        });

        $this->view('layout.php','shared');
    }
    function autosAction(){
        include CURR_VIEW_PATH .'shared'.DS.'layout.php';
    } 
    function getTodasLasMarcas(){
        if(!isset($this->todasLasMarcas) || count($this->todasLasMarcas)==0){
            $this->todasLasMarcas = $this->MarcasBL->getAllMarcas();
        }
        return $this->todasLasMarcas;
    }
    function SaveAction()
    {
        if($_POST)
        {
            $item = new MarcasModel();
            $item->Id = $_POST['Id'];   
            $item->Nombre = $_POST['Nombre'];
            $this->MarcasBL->saveMarca($item);
        }
        $this->redirectToAction('Index', 'marcas');
    }
    function DeleteAction()
    {
        $this->setContent(function(){
            if($this->hasParameters()){
                $Id = $this->parameters[0];
                if(is_numeric($Id))
                {
                    $queryResult = $this->MarcasBL->getMarcaById($Id);
                    $this->ViewModel->Id = $queryResult['Id'];
                    $this->ViewModel->Nombre = $queryResult['Nombre'];
                }
            }
            $this->view('DeleteView.php');
        });        
        $this->view('layout.php','shared');
    }
    function ConfirmDeleteAction(){
        if($_POST){
            $Id = $_POST['Id'];
            if(is_numeric($Id))
            {
                $this->MarcasBL->deleteMarca($Id);
            }
        }
        $this->redirectToAction('Index',"Marcas");
    }
}
?>