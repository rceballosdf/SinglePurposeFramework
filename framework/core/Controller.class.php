<?php
/** 
 * Base Controller
 * 
 * */
class Controller{

    // Base Controller has a property called $loader, it is an instance of Loader class(introduced later)
    protected $loader;
    public $usuariosBL;
    public $usuario;
    public $start_datetime;
    private $contentFunction;
    public $scriptsSections;
    
    public function __construct()
    {
        $this->scriptsSections=array();
        $this->loader = new Loader();
        $this->usuariosBL = $this->loader->bl("UsuariosBL");
        $this->usuario = $this->getCurrrentUser();
    }
    public function redirect($url,$message,$wait = 0)
    {
        if ($wait == 0){
            header("Location:$url");
        } else {
            include CURR_VIEW_PATH . "message.html";
        }
        exit;
    }
    public function redirectToAction($actionName="index",$controller="", $parameters=null)
    {
        if($controller===""){
            $controller = $this->controllerName;
        }
        $url = BASE_URL . $controller . US . $actionName .US ;
        header("Location:$url");
    }
    public function getCurrrentUser()
    {
        return $this->usuariosBL->GetCurrentUser();
    }
    public function isAuthenticated()
    {
        return $this->usuariosBL->IsAuthenticated();
    }
    public function setContent($contentCallback)
    {
        $this->contentFunction = $contentCallback;
    }
    public function addScript($scriptCallback)
    {
        array_push($this->scriptsSections,$scriptCallback);
    }
    public function showScripSection()
    {
        if(count($this->scriptsSections)>0){
            foreach($this->scriptsSections as $scriptCallback){
                $scriptCallback();
            }
        }
    }
    public function showContent()
    {
        if(isset($this->contentFunction)){
            $executableContentFunction=$this->contentFunction;
            $executableContentFunction();
        }
    }
    public function actionLink($text,$actionName,$controllerName, $htmlAttr='')
    {
       
        $actionUrl = $this->actionURL($actionName,$controllerName);
        echo "<a href='".$actionUrl."'".$htmlAttr.">".$text."</a>";
    }
    public function actionURL($actionName,$controllerName)
    {
        if($controllerName===""){
            $controllerName = $this->controllerName;
        }
        return BASE_URL.$controllerName.US.$actionName;
    }
    public function printActionURL($actionName,$controllerName)
    {
        echo $this->actionURL($actionName, $controllerName);
    }
    public function urlContent($path)
    {
        echo PUBLIC_URL.$path;
    }
    protected function view($viewname='',$folderpath='')
    {
        if($viewname==''){
            include $this->view('layout.php','shared');
        }
        if($folderpath==''){
            $folderpath=CURR_VIEW_PATH.$this->controllerName.DS;
        }
        else{
            $folderpath=CURR_VIEW_PATH.$folderpath.DS;
        }
        include $folderpath.$viewname;
    }
    protected function validationMessage($message,$controllerName)
    {
        echo "<span class='field-validation-valid text-danger' data-valmsg-for='".$controllerName."' data-valmsg-replace='true'>".$message."</span>";
    }
    protected function textbox($controlName='',$value='',$htmlAttr='')
    {
        echo "<input type='text' id='".$controlName."' name='".$controlName."' ".$htmlAttr." value='".$value."' />";
    }
    protected function label($controlName='', $text='',$htmlAttr='')
    {
        echo "<label for='".$controlName."' ".$htmlAttr.">".$text."</label>";
    }
    protected function hidden($controlName, $value)
    {
        echo "<input type='hidden' id='".$controlName."' name='".$controlName."' value='".$value."'>";
    }
    protected function hasParameters()
    {
        return count($this->parameters)>0;
    }
    protected function beginForm($action, $controller, $method='', $htmlAttr='')
    {
        if(empty($method))
        {
            $method ='POST';
        }
        echo "<form action='". $this->actionURL($action, $controller) ."' method='".$method."' ".$htmlAttr." >";
    }
    protected function endForm()
    {
        echo "</form>";
    }
}?>