<?php
require_once '../config/index.php';
require_once '../function/allfunc.php';

$status=$_GET[status];
$team=$_GET[catagory];

    
if($team=='All'){
    $sql="SELECT `catname` FROM `usercatagory`";
    $result=  mysql_query($sql);
    while($row=  mysql_fetch_array($result)){
        $subqcat="Catagory='$row[0]' and";
    skeleton($status,$row[0],$subqcat);
    }
    
}
else{
    $subqcat="Catagory='$team' and";
    skeleton($status,$team,$subqcat);
}


function skeleton($status,$team,$subqcat){
    $state=$_GET[status];
    if($state=="All"){
        $state="operation";
    }
  
echo '<b>'.$team.' Team '.$status.' case from '.$_GET[start].' To '.$_GET[endedate].'</b>';
    echo "<table width=100% >
                <tr id=tdt>
                <td id=tdh><b>Case Id</b></td>
                <td id=tdh width=200><b>Titles</b></td>
                <td id=tdh ><b>Request Time</td>
                <td id=tdh><b>$state Time</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td> 
                <td id=tdh><b>Assingned To</td>
                <td id=tdh><b>Status</td></tr>";
    
$sqlaction="";

if($status=="All"){
    //echo "Alalalalaal";
    //$subqcat="";
    $statusac="";
     
    $sqlaction="SELECT CaseId,Assignmenttime FROM `AssignedCase` where CaseStatus=0 and `Assignmenttime` between '$_GET[start]'and '$_GET[endedate]' ORDER BY `AssignedCase`.`CaseId` DESC"; 
    $result=  mysql_query($sqlaction);
    displaylist($result,$subqcat); 
    
    $sqlaction="SELECT caseid,dateOfconformation FROM `closeReport` where `closeReport`.`dateOfconformation` between '$_GET[start]'and '$_GET[endedate]' ORDER BY `closeReport`.`caseid` DESC"; 
    $result=  mysql_query($sqlaction);
    displaylist($result,$subqcat);
    
    $sqlaction="SELECT Caseid,resolvetime FROM `ResolvedReport` where `ResolvedReport`.`Conformationstatus`=0 and resolvetime between '$_GET[start]'and '$_GET[endedate]' ORDER BY `ResolvedReport`.`Caseid` DESC";
    $result=  mysql_query($sqlaction);
    displaylist($result,$subqcat);
    
}
if($status=="Assined")
    {
    
    $sqlaction="SELECT CaseId,Assignmenttime FROM `AssignedCase` where CaseStatus=0 and `Assignmenttime` between '$_GET[start]'and '$_GET[endedate]' ORDER BY `AssignedCase`.`CaseId` DESC"; 
    $result=  mysql_query($sqlaction);
    displaylist($result,$subqcat);
    }
if($status=="Closed"){
    $sqlaction="SELECT caseid,dateOfconformation FROM `closeReport` where `closeReport`.`dateOfconformation` between '$_GET[start]'and '$_GET[endedate]' ORDER BY `closeReport`.`caseid` DESC"; 
    $result=  mysql_query($sqlaction);
    displaylist($result,$subqcat);
    
}
if($status=="Resolved"){
    $sqlaction="SELECT Caseid,resolvetime FROM `ResolvedReport` where `ResolvedReport`.`Conformationstatus`=0 and resolvetime between '$_GET[start]'and '$_GET[endedate]' ORDER BY `ResolvedReport`.`Caseid` DESC";
    $result=  mysql_query($sqlaction);
    displaylist($result,$subqcat);

}
echo "</table>";

}

function getCreateTime($id){
   $sql="SELECT date FROM `actions` where actionperformed='create'";
   $result=  mysql_query($sql);
   $row=  mysql_fetch_array($result);
   return $row[0];
}
function displaylist($result,$subqcat)
    {
    


$header=0;
    while($row= mysql_fetch_array($result))
        {
         $sql="SELECT * FROM `caselist` where ($subqcat caseid={$row[0]})";
         $caselist=  mysql_query($sql);
         $rowcount=  mysql_num_rows($caselist);
         $caserow=  mysql_fetch_array($caselist);
         
         if($caserow>0){
             if($header==0){
                

                 $header=1;
             }
  
    if($sw==0)
        {
            $sw=1;
            $id="tr1";
            
        }
        else
        {
            
            $sw=0;
            $id="tr2";
        }
        
        echo"<tr id=$id onclick=loadXMLDoc('mainb','comm/case/detail.php?caseid=$row[0]&source=comm/managers/Allteamcase.php')>
                    <td id ='smal'>$caserow[0]</td>
                    <td id ='smal'>$caserow[1]</td>
                    <td id ='smal'>".getCreateTime($caserow[0])."</td>
                    <td id ='smal'>$row[1]</td>
                    <td id ='smal'>$caserow[4]</td>
                    <td id ='smal'>$caserow[5]</td>
                    <td id ='smal'>".GetReceivertime($caserow[0])."</td>
                        <td id ='smal'>".  getCaseStatus($caserow[0])."</td>
                    </tr>";   
    
        }
        
        }
    
}