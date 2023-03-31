<?php
require_once '../../../config/index.php';
$query="select * from users";
$result=  mysql_query($query);
$swicher=0;
echo"<table width=80% ><tr bgcolor=gray><td id=tdh>Name</td><td id=tdh>Team</td></tr>";
while($row=  mysql_fetch_array($result)){
    if($swicher==0){
        $swicher=1;
        $id="tr1";
        
    }
 else {
     $swicher=0;
     $id="tr2";
        
    }
    echo"<tr id=$id onclick=privilageseter('mainb','admin/users/privilages/chpr.php','$row[0]')>
                <td>$row[2] $row[3] $row[4]</td>
                <td>$row[5]</td>
                
            </tr>";
}
echo"</table>";
?>
        
            
      