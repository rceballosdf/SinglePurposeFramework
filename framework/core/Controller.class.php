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
    public $executedActionName;
    public $executedControllerName;
    public $logger;
    public $showFooter;
    public function __construct()
    {
        $this->scriptsSections=array();
        $this->loader = new Loader();
        $this->usuariosBL = $this->loader->bl("UsuariosBL");
        $this->usuario = $this->getCurrrentUser();
        $this->logger = Logger::getLogger("main");
        $this->showFooter=true;
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
    protected function selectList($items, $valueProperty,$textProperty,$name, $selectedValue=0,$htmlAttr=''){
        echo "<select id='".$name."' ".$htmlAttr." name='".$name."'>";
        if(is_array($items)){
            foreach($items as $item){
                if(property_exists($item,$valueProperty) && property_exists($item,$textProperty)){
                    $selected ="";
                    if($item->$valueProperty === $selectedValue){
                        $selected = "selected";
                    }
                    echo "<option value='".$item->$valueProperty."' ".$selected.">".$item->$textProperty."</option>";
                }
            }
        }
        echo "</select>";
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
    public function InstallAction()
    {
        
    }
    protected function setModel($viewModel, $queryResult){
        $properties = get_object_vars($viewModel);
        foreach($properties as $key => $val){
            if(array_key_exists($key,$queryResult)){
            $viewModel->$key = $queryResult[$key];
            }            
        }
        return $viewModel;
    }
    protected function setListModel($viewModel,$queryResult){
        $result = array();
        $properties = get_object_vars($viewModel);
        $classtype = get_class($viewModel);
        foreach($queryResult as $row){
            $item = new $classtype;

            foreach($properties as $key => $val){
                if(array_key_exists($key,$row)){
                $item->$key = $row[$key];
                }
            }    
            array_push($result,$item);        
        }
        return $result;
    }
    protected function isExecutedAction($actionName, $controllerName, $htmlAttr){
        if($this->executedActionName === $actionName & $controllerName === $this->controllerName){
            echo $htmlAttr;
        }
        echo "";
    }
}?>