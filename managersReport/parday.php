<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../config/index.php");
//echo "per day";
$query="select max(id) from createlist";
$result=  mysql_query($query);
$max=  mysql_fetch_array($result);

$query="insert into createlist
SELECT `actions`.`caseid`,`actions`.`date`,`caselist`.`Catagory`
FROM actions
LEFT JOIN `support`.`caselist` ON `actions`.`caseid` = `caselist`.`caseid`
WHERE `actions`.`actionperformed` = 'create'and `actions`.`caseid`>$max[0]";
if(!mysql_query($query)){
    
    echo "inser not succefull";
}
$query="SELECT dateofcreation, count( id )
FROM createlist
GROUP BY `dateofcreation`";
$result=  mysql_query($query);
echo"<table ><tr><td id=tdh> case Creation Date</td><td id=tdh>number of Case in a day</td></tr>";
while($row=mysql_fetch_array($result)){
    echo "<tr><td id=tr1> $row[0]</td><td id=tr2> $row[1]</td></tr>";
}
echo"</table>";
        
        



