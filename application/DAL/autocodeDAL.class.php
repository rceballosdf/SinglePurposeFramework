<?php

class AutoCodeDAL{
    private $select_tables_command = "select table_name, concat(table_name,'DAL') AS DAL from information_schema.tables where table_schema='cads';";
    private $select_columns_command = "select table_name, column_name, ordinal_position, column_key,data_type from information_schema.columns where table_schema='cads' AND table_name = :table order by table_name, ordinal_position, column_key;";
    private $select_primarykey_command = "select table_name, column_name, ordinal_position, column_key from information_schema.columns where table_schema='cads' AND table_name = ':table' AND column_key='PRI' order by table_name, ordinal_position, column_key;";
    //DataAccess Object
    private $DB;
    /// Constructor
    function __construct (){
        $this->DB = new Db(DBHost, DBName, DBUser, DBPassword);
    }    
    public function getTables(){
        return $this->DB->query($this->select_tables_command);
    }
    public function getColumns($table){
        $parameters = array('table'=>$table);
        return $this->DB->query($this->select_columns_command, $parameters);
    }
    public function getPrimaryKey($table){
        $parameters = array('table'=>$table);
        return $this->DB->query($this->select_primarykey_command, $parameters);
    }
}
?>