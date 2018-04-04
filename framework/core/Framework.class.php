<?php 
class Framework {
    public static function run($start_datetime) {
        self::init();
        self::autoload();
        self::dispatch($start_datetime);
    }
    private static function init() {
        // Define path constants
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", getcwd() . DS);
        define("BASE_URL","http://localhost:8080/CADS/");
        define("US", "/");
        define("APP_PATH", ROOT . 'application' . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);
        define("CONFIG_PATH", APP_PATH . "config" . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VENDOR_PATH", ROOT . "vendor" . DS);
        define('DATABASE_PATH',FRAMEWORK_PATH . 'database' . DS );

        define("BL_PATH", APP_PATH . "BL" . DS);
        define("DAL_PATH", APP_PATH . "DAL" . DS);
        define("LOGS_PATH", APP_PATH . "Logs" . DS);

        define("VIEW_PATH", APP_PATH . "views" . DS);
        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
        define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
        define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
        define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);
        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);

        define("PUBLIC_URL", BASE_URL . "public" . DS);
        define("JS_URL", PUBLIC_URL  . "js" . DS);
        define("CSS_URL", PUBLIC_URL . "css" . DS);
        define("IMG_URL", PUBLIC_URL . "img" . DS);

        // Define platform, controller, action, for example:
        // index.php?p=admin&c=Goods&a=add
        define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : '');
        define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'home');
        define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');
        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
        define("CURR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);
        // Load core classes and vendor installed utilities
        require VENDOR_PATH . "autoload.php";
        require CORE_PATH . "Controller.class.php";
        require CORE_PATH . "Loader.class.php";
        require CORE_PATH . "Model.class.php";
        require DATABASE_PATH . 'db.php';
        // Load configuration file
        $GLOBALS['config'] = include CONFIG_PATH . "config.php";
        // Start session
        session_start();
    }
    private static function autoload(){
        spl_autoload_register(array(__CLASS__,'load'));
    }
    // Define a custom load method
    private static function load($classname){
        // Here simply autoload app’s controller and model classes
        if (substr($classname, -10) == "Controller"){
            // Controller
            $controllerToLoad = CURR_CONTROLLER_PATH . "$classname.class.php";
            if(file_exists($controllerToLoad)){
                require_once $controllerToLoad;
            }
            else{
                echo 'No existe el controlador';
                exit;
            }
        } elseif (substr($classname, -5) == "Model"){
            // Model
            require_once  MODEL_PATH . "$classname.class.php";
        }
        elseif(substr($classname,-2)=="BL"){
            require_once BL_PATH . "$classname.class.php";
        }
        
        elseif(substr($classname,-3)=="DAL"){
            require_once DAL_PATH . "$classname.class.php";
        }
    }
    private static function dispatch($start_datetime) {
        // Instantiate the controller class and call its action method

        list($path) = explode('?', $_SERVER['REQUEST_URI']);
        //Remove script path:
        $path = substr($path, strlen(dirname($_SERVER['SCRIPT_NAME']))+1);
        //Explode path to directories and remove empty items:
        $pathInfo = array();
        foreach (explode('/', $path) as $dir) {
            if (!empty($dir)) {
                $pathInfo[] = urldecode($dir);
            }
        }
        if (count($pathInfo) > 0) {
            //Remove file extension from the last element:
            $last = $pathInfo[count($pathInfo)-1];
            list($last) = explode('.', $last);
            $pathInfo[count($pathInfo)-1] = $last;
        }

        $routeRequested = explode('/', $path);
        $controllerFileName = $routeRequested[0].'Controller.php';
        $controllerClass = ($routeRequested[0] ==''?'home': $routeRequested[0]).'Controller';
        $actionRequested = count($routeRequested)==1?'index':$routeRequested[1];
        $parameters = array();
        for ($i = 0; $i < count($routeRequested)-2; $i++) {
            $parameters[$i] = $routeRequested[$i+2];
        }
        
        $controller_name = CONTROLLER . "Controller";
        $action_name = ($actionRequested!='' && ACTION!=$actionRequested ? $actionRequested."Action" : ACTION."Action");
        $controller = new $controllerClass;
        $controller->parameters = $parameters;
        $controller->controllerName = $routeRequested[0];
        $controller->executedActionName = str_replace("Action","",$action_name);
        $controller->start_datetime=$start_datetime;
        if(method_exists($controller,$action_name)){
            $controller->$action_name();
        }
        else{
            echo 'Error no existe el action';
        }
    }
}

?>