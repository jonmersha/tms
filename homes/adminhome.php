<?php
require_once '../config/index.php';
require_once '../function/allfunc.php';
function  loadpage(){
    //echo"loadviews('loc','../homes/adminuserv/Allusercase.php')'";
    
}
?>
<html>
    <body  onload=<?php loadpage(); ?>>
<table width=100% align="center">
    
     <tr>
        <td>
            <table width="100%" align="center" >
                <tr width="100%">
                    <td align='center' width='50%'>
                        <table width='100%'>
                            <tr width='100%'>
                                <td id='tab1'>
                                    <table  width='100%' align='center'>
                                        <tr ><td align='left'><a><b><u>User List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b></a></td></tr>
                                        <tr>
                                            <td><div style="overflow:scroll; height:200px;" >
                                                <table width=100% id="tdt">
                                                <tr id="tdt"><td id="tdh"><b>User Name</b></td><td id="tdh">Last Name</td><td id="tdh">Team</td><td id="tdh">Privilege</td></tr>
                                                <?php echo getusers();?>
                                                </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                    </tr>
               </table>   
            </td>
            <td>
                        <table width='100%'>
                            <tr>
                                <td id='tab1'>
                                    <table  width='100%'>
                                        <tr><td align='left'><a><b><u>Process List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b></a></td></tr>
                                        <tr>
                                            <td>
                                                <div style="overflow:scroll; height:200px;" >
                                                <table width='100%' id="tdt">
                                                <tr id="tdt"><td id="tdh">Cod</td><td id="tdh">Name</td><td id="tdh">location</td><td id="tdh">Extension</td></tr>
                                                <?php echo getdeepartment();?>
                                                </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                    </tr>
               </table>   
            </td>
           </tr>           
        </table>       
      </td>
     </tr>
     <tr>
        <td>
            <table width="100%" align='center'>
                <tr>
                    <td width='50%'>
                        <table width='100%'>
                            <tr>
                                <td id="tab1">
                                    <table id="ta1" width='100%'>
                                        <tr><td>Case Priority List</td></tr>
                                        <tr>
                                            <td><div style="overflow:scroll; height:200px;" >
                                                <table width='100%'>
                                                    <b><tr id="tdt"><td id="tdh">ID</td><td id="tdh">Priority</td></tr></b>
                                                <?php echo getprlist();?>
                                                </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                    </tr>
               </table>   
            </td>
            <td>
                        <table width='100%'>
                            <tr>
                                <td >
                                    <table id=tab1 width='100%'>
                                        <tr><td align='center'>Team List</td></tr>
                                        <tr>
                                            <td id="tab1">
                                                <div style="overflow:scroll; height:200px;" >
                                                <table width='100%' id="tdt">
                                                <tr id="tdt"><td id="tdh">ID</td><td id="tdh">Team Name</td></tr>
                                                <?php echo getTeam();?>
                                                </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                    </tr>
               </table>   
            </td>
           </tr>           
        </table>       
      </td>
     </tr>
     <tr><td><?php echo userconfirmnotification();?></td></tr>
    
</table>
</body>
</html>
<?php
function getusers(){
    $swicher=1;
    $sql="SELECT * FROM users limit 0,20 ";
    $result=  mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        if($swicher==0)
        {
        $swicher=1;
        $id="tr1";
    }
 else {
        $swicher=0;
        $id="tr2";
    
}
        $rss=$rss."<tr id=$id widht=100%><td>$row[2]</td><td>$row[3]</td><td>$row[5]</td><td>$row[6]</td></tr>";
        
    }
    return $rss;
}
function getprlist(){
    $swicher=0;
    
    $sql="SELECT * FROM `CasePriority`  limit 0,4 ";
    $result= mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        if($swicher==0)
        {
        $swicher=1;
        $id="tr1";
    }
 else {
        $swicher=0;
        $id="tr2";
    
}
        $rss=$rss."<tr id=$id><td>$row[0]</td><td>$row[1]</td></tr>";
        
    }
    return $rss;
}
function getdeepartment(){
    $swicher=1;
   
    $sql="SELECT * FROM workunit limit 0,4 ";
    $result=  mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        if($swicher==0)
        {
        $swicher=1;
        $id="tr1";
    }
 else {
        $swicher=0;
        $id="tr2";
    
}
        $rss=$rss."<tr id=$id><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
        
    }
    return $rss;
    
}
//////////////////////////////////////Team
function getTeam(){
    $swicher=1;
    
    $sql="SELECT * FROM `usercatagory` limit 0,4 ";
    $result=  mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
       if($swicher==0)
        {
        $swicher=1;
        $id="tr1";
    }
 else {
        $swicher=0;
        $id="tr2";
    
}
        $rss=$rss."<tr id=$id><td>$row[0]</td><td>$row[1]</td></tr>";
        
    }
    return $rss;
}
?>


