<?php
/* backup the db OR just a table */ 
function backup_tables($host,$user,$pass,$name,$tables = '*') 
{ 
    $link = new mysqli($host,$user,$pass); 
    $link->select_db($name); 
    //get all of the tables 
    if($tables == '*') 
    { 
        $tables = array(); 
        $result = $link->query('SHOW TABLES'); 
        while($row = $result->fetch_row()) 
        { 
            $tables[] = $row[0]; 
        } 
    } 
    else 
    { 
        $tables = is_array($tables) ? $tables : explode(',',$tables); 
    } 
    //cycle through 
    foreach($tables as $table) 
    {         
        $result = $link->query('SELECT * FROM '.$table); 
        $num_fields = $result->field_count; 
        $return.= 'DROP TABLE '.$table.';'; 
        $row2 = mysqli_fetch_row(mysql_query('SHOW CREATE TABLE '.$table)); 
        $return.= "nn".$row2[1].";nn"; 
        for ($i = 0; $i < $num_fields; $i++)  
        { 
            while($row = mysqli_fetch_row($result)) 
            { 
                $return.= 'INSERT INTO '.$table.' VALUES('; 
                for($j=0; $j<$num_fields; $j++)  
                { 
                    $row[$j] = addslashes($row[$j]); 
                    $row[$j] = ereg_replace("n","n",$row[$j]); 
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; } 
                    if ($j<($num_fields-1)) { $return.= ','; } 
                } 
                $return.= " ) ; n";  //Quitar espacios en blanco 
            } 
        } 
        $return.="nnn"; 
    } 
    //save file 
    $handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+'); 
    fwrite($handle,$return); 
    fclose($handle); 
} 
?>