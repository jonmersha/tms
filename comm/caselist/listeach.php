<table width='100%'>
    <tr><td ><div id=tr1 align='left' onclick=loadXMLDoc('mainb','comm/caselist/Alllist.php')>Hide <?php echo $_GET[status];?></div></td></tr>

</table>
<?php


require_once("../../config/index.php");
$status=$_GET[status];
mycase($status);
function mycase($rqtype){
    $swicher=0;
   $sql="select caseid,date,userid from actions where actionperformed='create' ORDER BY `actions`.`caseid` DESC";
   $result=  mysqli_query($con,$sql);
   echo"<table width=100%>
                <tr>
                <td id=tdh><b>Case Id</b></td>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requested By</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td></tr>";
while($row=mysqli_fetch_array($result))
       {
        $userqery="SELECT f_name,m_name FROM `users`  where userid=$row[2]";
        $userresult=  mysqli_query($con,$userqery);
        $urow=  mysqli_fetch_array($userresult);
        $csql="SELECT * FROM `caselist` where caseid=$row[0]";
        $rs=  mysqli_query($con,$csql);
        $crow=  mysqli_fetch_array($rs);
       if($swicher==0){
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
    if($rqtype==$crow[3]){
    echo"<tr id=$trid onclick=loaddetails('mainb','comm/caselist/Details.php',$row[0])>"
            . "<td>$crow[0]</td>"
            . "<td>$crow[1]</td>"
            . "<td>$urow[0]--$urow[1]</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td></tr>";
}
    }
    echo"</table>";
    
}
