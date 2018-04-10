<pre><code class="nohighlight">
<?php
foreach( $this->CodeBL->GetTables() as $table){
    CreateClasses($table['table_name'],$this->CodeBL->GetColumns($table['table_name']));
}
function CreateClasses($tableName, $columns){
    printEntityClass($tableName, $columns);
    printDalClass($tableName, $columns);
    //printBLClass($table, $columns);
}
function printEntityClass($tableName,$columns){
    $texto = "<?php \n";    
    $texto = $texto . "\n" ."class ". $tableName . "Entity{\n";     
    foreach($columns as $column){
        $texto = $texto . "public $".$column['column_name'].";" . "\n\t";
    }
    $texto = $texto."public function __construct(){\n\t";
    foreach($columns as $column){
        switch($column['data_type']){
            case 'int':
            case 'tinyint':
            case 'smallint':
            case 'mediumint':
            case 'bigint':
            case 'float':
            case 'double':
            case 'decimal':
                $texto = $texto ."$"."this->" . $column['column_name']." = 0;\n\t\t";
                break;
            case 'varchar':
                $texto = $texto ."$"."this->" . $column['column_name']." = '';\n\t\t";
                break;
            
        }
        
    }
    $texto = $texto."}\n\t";
    $texto = $texto . "} \n" . "?>\n";
    echo $texto;
     file_put_contents ( MODEL_PATH.DS."entities".DS.$tableName."Entity.class.php" , $texto);
}
function printDalClass($tableName,$columns){
    $texto = "<?php \n";
    $texto = $texto . "\n" ."class ". $tableName . "BaseDAL{\n";
    $texto = $texto ."private $"."query_SelectALL = 'SELECT * FROM ".$tableName."';\n";
    $texto = $texto ."private $"."query_SelectById = 'SELECT * FROM ".$tableName." where Id =:Id';\n";
    
    $texto = $texto ."private $"."command_insert = 'insert into ".$tableName."(".separatedComaColumns($columns).") values(".getColumnsToInsert($columns).");';\n";
    $texto = $texto ."private $"."command_update = 'update ".$tableName." set ".getColumnsToUpdate($columns)." Where Id=:Id;';\n";
    $texto = $texto ."private $"."command_delete = 'delete from ".$tableName." Where Id=:Id;';\n\n";
  
    $texto = $texto ."function __construct (){\n";
    $texto = $texto ."    $"."this->DB = new Db(DBHost, DBName, DBUser, DBPassword);\n";
    $texto = $texto ."}\n\n";

    $texto = $texto ."public function selectAll(){\n";
    $texto = $texto ."    return $"."this->DB->query($"."this->query_SelectALL);\n";
    $texto = $texto ."}\n\n";

    $texto = $texto ."public function selectById($"."Id){\n";
    $texto = $texto ."    $"."parameters = array('Id'=>$"."Id);\n";
    $texto = $texto ."    return $"."this->DB->query($"."this->query_SelectById, $"."parameters)[0];\n";
    $texto = $texto ."}\n\n";
    
    $texto = $texto ."public function Insert($"."item){\n";
    $texto = $texto ."    $"."parameters = array(".arrayInsertParameters($columns).");\n";
    $texto = $texto ."    $"."this->DB->query($"."this->command_insert,$"."parameters);\n";
    $texto = $texto ."    $"."item->Id = $"."this->DB->lastInsertId();\n";
    $texto = $texto ."    return $"."result;\n";
    $texto = $texto ."}\n\n";

    $texto = $texto ."public function Update($"."item){\n";
    $texto = $texto ."    $"."parameters = array(".arrayUpdateParameters($columns).");\n";
    $texto = $texto ."    $"."this->DB->query($"."this->command_update,$"."parameters);\n";
    $texto = $texto ."}\n\n";

    $texto = $texto ."public function Delete($"."id){\n";
    $texto = $texto ."    $"."parameters = array('Id'=>$"."id);\n";
    $texto = $texto ."    $"."this->DB->query($"."this->command_delete,$"."parameters);\n";
    $texto = $texto ."}\n\n";

    $texto = $texto . "} \n" . "?>\n";
    echo $texto;
    file_put_contents (DAL_PATH."base".DS.$tableName."BaseDAL.class.php" , $texto);
}
function arrayInsertParameters($columns){
    $columntext ="";
    foreach($columns as $column){
        if($column['column_name']!=='Id'){
            $columntext = $columntext . "'" .$column['column_name'] ."'"." => $"."item->".$column['column_name'].",";
        }
    }
    $columntext = substr($columntext,0,strlen($columntext)-1);
    return $columntext;
}
function arrayUpdateParameters($columns){
    $columntext ="";
    foreach($columns as $column){
        if($column['column_name']!=='Id'){
            $columntext = $columntext . "'" .$column['column_name'] ."'"." => $"."item->".$column['column_name'].",";
        }
    }
    $columntext = substr($columntext,0,strlen($columntext)-1);
    return $columntext;
}
function separatedComaColumns($columns){
    $columntext ="";
    foreach($columns as $column){
        $columntext = $columntext . $column['column_name'] .',';
    }
    $columntext = substr($columntext,0,strlen($columntext)-1);
    return $columntext;
}
function getColumnsToUpdate($columns){
    $columntext ="";
    foreach($columns as $column){
        if($column['column_name']!=='Id'){
            $columntext = $columntext . $column['column_name'] .' = :'.$column['column_name'].",";
        }
    }
    $columntext = substr($columntext,0,strlen($columntext)-1);
    return $columntext;
}
function getColumnsToInsert($columns){
     $columntext ="";
    foreach($columns as $column){
        $columntext = $columntext . ":".$column['column_name'] .',';
    }
    $columntext = substr($columntext,0,strlen($columntext)-1);
    return $columntext;
}

?>
</code></pre>
