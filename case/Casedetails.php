<a href='#'onclick=loadXMLDoc('mainb','case/AllCaselist.php')><snap>Back to case list</snap></a>
<?php
require_once("../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}

    mysql_select_db($dbname, $con);
    $query="SELECT `caselist`.`caseid`,`caselist`.`title`,`caselist`.`details`,`caselist`.`regdate`,`caselist`.`requester`,`users`.`f_name`,`users`.`m_name` FROM caselist
LEFT JOIN `DBESupport`.`users` ON `caselist`.`openedby` = `users`.`userid`  where(caselist.caseid=$_GET[caseid])
";

    
   // $query="select * from caselist where(caseid='$_GET[caseid]')";
    $result=  mysqli_query($con,$query);
    echo"<table valign='top' border='1'>"
    . "<tr bgcolor='gray'>"
            . "<td >Caseid</td><td >Title</td><td >Descreption</td><td >Status</td><td >Request date</td><td >Requested by</td><td >Case Opened by</td><td >RQ Departmetn</td><td >catagory</td><td >Actions</td>"
      . "</tr >";
    while($row=  mysqli_fetch_array($result))
    {
        echo"<tr>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[10]</td>"
             . "<td><a href='#Casedetails' onclick=loadforms('mainb','case/Casedetails.php')>detail</a><a>Destroy</a><a>Edite</a></td>"
            . "</tr>";
        
        
    }
    echo"</table>";

?>
