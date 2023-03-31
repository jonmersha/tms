
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}

    mysql_select_db($dbname, $con);
echo "<a href='#edite'onclick=loadforms('homeaction','case/home/details.php?caseid=$_GET[caseid]')>back to Details</a>";
$query="SELECT `caselist`.`caseid` , `caselist`.`title` , `caselist`.`details` , `caselist`.`status` , `caselist`.`regdate` , `caselist`.`requester` , `users`.`f_name` , `users`.`m_name` , `workunit`.`name` , `workunit`.`location` , `caselist`.`ext` , `caselist`.`Priority`,`AssignedCase`.`Assignmenttime`
FROM caselist
LEFT JOIN `DBESupport`.`workunit` ON `caselist`.`workunit` = `workunit`.`cod`
LEFT JOIN `DBESupport`.`users` ON `caselist`.`openedby` = `users`.`userid`
LEFT JOIN  `DBESupport`.`AssignedCase` ON  `caselist`.`caseid` =  `AssignedCase`.`CaseId` 
WHERE (
caselist.caseid ='$_GET[caseid]'
)
LIMIT 0 , 30"
;
    $result=  mysql_query($query);
    echo"<table valign='top'>";
    while($row=  mysql_fetch_array($result))
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
        <th align='left'>EditHistory</th><td>$row[2]</td>
    </tr>
    <tr>
        <th align='left'>Resolved by doing</th><td><TextArea id='editetext' cols='60' rows='15'></TextArea></td>
    </tr>"
                
              ; 
    }
    echo"<tr>
        <th align='left'></th><td>|<a href='#edite'onclick=loadforms('homeaction','case/home/saveedite.php?caseid=$_GET[caseid]')>save</a> || <a href='#resolv'>Discard</a>|</td>
    </tr>"; 
    echo"</table>";
    ?>



