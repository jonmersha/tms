<?php
require_once '../config/index.php';
$sql="select * from users where userid=$_GET[userid]";
$result=  mysqli_query($con,$sql);
$sql="delete from PRSet where userid=$_GET[userid] and Prmition='$_GET[pr]'";
if($_GET['rqtype']=='Add')
    {
    $sql="insert into PRSet values($_GET[userid],'$_GET[pr]')";  
    
}
if(!mysqli_query($con,$sql))
    {
    mysql_error();
    }   
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
                    <table id="tdh" width="100%">
                        <?php
                        $query ="SELECT * FROM PRSet WHERE userid = $_GET[userid]";
                        $result=  mysqli_query($con,$query);
                        $sw=0;
                        while($row= mysqli_fetch_array($result)){
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
                        $result=  mysqli_query($con,$query);
                        while($row=mysqli_fetch_array($result)){
                            $sql="select * from PRSet where userid=$_GET[userid] and Prmition='$row[0]'";
                            $results=mysqli_query($con,$sql);
                            
                          
                            
                            if(mysqli_num_rows($results)<1)
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


