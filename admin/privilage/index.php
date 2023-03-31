
 <?php
require_once '../../config/index.php';
if($_GET[id]!=""){
    $query="insert into app_prmision values('$_GET[id]','$_GET[priority]')";
    if(!mysql_query($query)){
        $message=  mysql_error();
    }
    
}
if($_GET[idd]!="")
    {
    //echo $_GET[idd];
    $sql="delete from app_prmision where pr_name='$_GET[idd]'";
    if(!mysql_query($sql)){
        echo mysql_error();
    }
    
    }
?>
<table>
    <tr>
        <td>Privilege type </td><td><input type="text" id="id"></td>
    </tr>
    <tr>
        <td>Description</td><td><input type="text" id="priority"></td>
    </tr>
    <tr>
        <td></td><td><input type="button" value="Save" onclick="addpriority('mainb','admin/privilage/') "></td>
    </tr>
</table>
<div><?php echo $message; ?></div><hr>
<?php
$query="select * from app_prmision";
$result=  mysql_query($query);
$swicher=0;
echo"<table>
    <tr bgcolor=gray><td>priorityID</td><td>Priority</td><td></td></tr>";
    while($row=  mysql_fetch_array($result)){
        if($swicher==0){
            $swicher=1;
            $id="tr1";
        }
        else{
            $swicher=0;
            $id="tr2";
        }
    echo"<tr id='$id'><td>$row[0]</td><td>$row[1]</td>"
            . "<td><a href=#DeletePr onclick=deletepr('mainb','admin/privilage/index.php?idd=$row[0]')>Delete</a></td></tr>";
    }
echo"</table>";


?>


