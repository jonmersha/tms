<?php
//header("Location: /tms",TRUE,301);
header('Content-type: application/force-download');
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="export.csv"');
header('Pragma:no-cache');
require_once("../config/index.php");
require_once("../function/allfunc.php");
$query="SELECT * FROM actions where actionperformed='create' and userid=$_POST[users]";

$result=  mysqli_query($con,$query);
$rownumber= mysql_num_rows($result);
//echo "lalalalaq".$_POST[statuss];
if($_POST[statuss]=="o"){
   $substr="";
}
else{
    $substr="and status='$_POST[statuss]'";
}
$swich=0;
//echo usersCase($_POST[users]);
$sql="select * from users where userid=$_POST[users]";
$resultu=  mysqli_query($con,$sql);
$rouser=  mysqli_fetch_array($resultu);
$data=array("total of $rownumber Cases created by_$rouser[2] $rouser[3]");
array_push($data,'caseid_CaseTitile_Team_Department_Requested By_Request time_Assined To_Assignement time_resolved at_case Status');

while($row=  mysqli_fetch_array($result)){
    $csql="SELECT * FROM `caselist` where (caseid=$row[0] $substr)";
     $rs=  mysqli_query($con,$csql);
     $rownum=  mysql_num_rows($rs);
     
    
     if($rownum>0){
         $crow=mysqli_fetch_array($rs);
          if($swicher==0)
           {
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
       
         array_push($data,"$row[0]_$crow[1]_$crow[8]_$crow[5]_$crow[4]_$row[3]_".GetReceiver($crow[0])."_". GetReceivertimeonly($crow[0])."_".getResolvetime($crow[0])."_$crow[3]");
         
     }
    
}

$fp = fopen('php://output', 'w');
foreach ($data as $line ) {
    $val=explode("_", $line);
    fputcsv($fp, $val);
}
fclose($fp);


       



