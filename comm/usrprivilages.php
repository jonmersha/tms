<?php
require_once '../config/index.php';
$sql="select * from users where userid=$_GET[userid]";
$result=  mysql_query($sql);
// $_GET[userid];


?>
<html>
    <head></head>
    <body>
        <table width="75%">
            <tr>
                <td id="th">Users Privileges</td><td></td><td id="th">Privileges Not Set to User</td>
            </tr>
            <tr>
                
                <td>
                    <table width="100%">
                        <?php
                        $query ="SELECT * FROM PRSet WHERE userid = $_GET[userid]";
                        $result=  mysql_query($query);
                        $sw=0;
                        while($row= mysql_fetch_array($result)){
   if($sw==0){
       $tr="tr1";
       $sw=1;
   }
   else{
       $tr="tr2";
       $sw=0;
       
   }
                            echo"<tr id=$tr onclick=prchange('mainb','comm/savepr.php?userid=$_GET[userid]&pr=$row[1]&rqtype=remove')><td>$row[1]</td><td>remove</td></tr>";
                            
                            
                        }
 
                                ?>
                        
                    </table>
                
                </td>
                <td></td>
                <td>
                    <table width="100%">
                        <?php
                        $sw=0;
                        $query="select * from app_prmision";
                        $result=  mysql_query($query);
                        while($row=mysql_fetch_array($result)){
                            $sql="select * from PRSet where userid=$_GET[userid] and Prmition='$row[0]'";
                            $results=mysql_query($sql);
                            
                          
                            
                            if(mysql_num_rows($results)<1)
                                {
                                if($sw==0){
                                    $tr="tr1";
                                    $sw=1;
                                     }
                            else{
                                    $tr="tr2";
                                    $sw=0;
       
                                 }
                                echo"<tr id=$tr onclick=prchange('mainb','comm/savepr.php?userid=$_GET[userid]&pr=$row[0]&rqtype=Add')><td>$row[0]</td><td>Add</td></tr>";
                                
                            }
                            
                            
                        }
                        ?>
                    </table>
                </td>                
            </tr>
        </table>
    </body>
</html>


