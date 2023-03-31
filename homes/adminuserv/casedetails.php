<?php
//echo "linked well";

require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}
    mysql_select_db($dbname, $con);
    $query=" SELECT  `caselist`.`caseid` ,  `caselist`.`title` ,  `AssignedCase`.`Assignmenttime` 
FROM caselist
LEFT JOIN  `AssignedCase` ON  `caselist`.`caseid` =  `AssignedCase`.`CaseId` 
where(caselist.caseid='$_GET[caseid]')
LIMIT 0 , 30";
    

    
    $lquery="SELECT `caselist`.`caseid` , `caselist`.`title` , `caselist`.`details` , `caselist`.`status` , `caselist`.`regdate` , `caselist`.`requester` , `users`.`f_name` , `users`.`m_name` , `workunit`.`name` , `workunit`.`location` , `caselist`.`ext` , `caselist`.`Priority`,`AssignedCase`.`Assignmenttime`
FROM caselist
LEFT JOIN `workunit` ON `caselist`.`workunit` = `workunit`.`cod`
LEFT JOIN `users` ON `caselist`.`openedby` = `users`.`userid`
LEFT JOIN  `AssignedCase` ON  `caselist`.`caseid` =  `AssignedCase`.`CaseId` 
WHERE (
caselist.caseid ='$_GET[caseid]'
)
LIMIT 0 , 30"
;
    $result=  mysql_query($query);
    echo"<table valign='top'>";
    while($row=mysql_fetch_array($result))
    {
        echo"
    <tr>
        <th align='left'>Caseid</th><td>$row[0]</td>
    </tr>
   <tr>
        <th align='left'>CaseTitle</th><td>$row[1]</td>
    </tr>
    <tr>
        <th align='left'>Description</th><td>$row[2]</td>
    </tr>
    <tr>
        <th align='left'>request Date</th><td>$row[4]</td>
    </tr>
    <tr>
        <th align='left'>assinegmnet Date</th><td>$row[12]</td>
    </tr>
    <tr>
        <th align='left'>Requester</th><td>$row[5]</td>
    </tr>
    <tr>
        <th align='left'>Department</th><td>$row[8]</td>
    </tr>
    <tr>
        <th align='left'>Location</th><td>$row[8]</td>
    </tr>
    <tr>
        <th align='left'>Ext</th><td>$row[10]</td>
    </tr>
    <tr>
        <th align='left'>Created by</th><td>$row[6]  $row[7]</td>
    </tr>
    <tr>
        <th align='left'>Priority</th><td>$row[11]</td>
    </tr>"; 
    }
    echo"<tr>
        
    </tr>"; 
    echo"</table>";
    
?>

