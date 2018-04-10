<?php
class Loader{
    // Load library classes
    public function library($lib){
        include_once LIB_PATH . "$lib.class.php";
    }
    // loader helper functions. Naming conversion is xxx_helper.php;
    public function helper($helper){
        include HELPER_PATH . "{$helper}_helper.php";
    }
    public function bl($classname){
        include_once BL_PATH . "$classname.class.php";
        return new $classname();
    }
    public function dal($classname){
        include_once DAL_PATH . "$classname.class.php";
        return new $classname();
    }
}
?>