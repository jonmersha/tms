<?php


require_once '../../config/index.php';
     $getmaxid="SELECT max(id) from CasePriority";
     $maxresult=mysqli_query($con,$getmaxid);
     $rowmax=  mysqli_fetch_array($maxresult);
     $idmax=$rowmax[0]+1;
     if($_GET['order']=="insert"){
if($_GET[name]!=""){
    
    
    $query="insert into CasePriority values($idmax,'$_GET[name]')";
    if(!mysqli_query($con,$query)){
        $message=  mysql_error();
    }
     }}
if($_GET['order']=="delete")
{
    $query="delete from CasePriority where id=$_GET[prid]";
    if(!mysqli_query($con,$query)){
        $message=  mysql_error();
    }
}
    
?>
<table>
    <tr>
        <td>Priority</td><td><input type="text" id="priority"></td>
    </tr>
    <tr>
        <td></td><td><input type="button" value="Save" onclick="allfuncp('mainb','admin/priority/','insert','pr')"></td>
    </tr>
</table>
<div><?php echo $message; ?></div><hr>
<?php
$query="select * from CasePriority";
$result=  mysqli_query($con,$query);
$swicher=0;
echo"<table>
    <tr bgcolor=gray><td>priorityID</td><td>Priority</td><td></td></tr>";
    while($row=  mysqli_fetch_array($result)){
        if($swicher==0){
            $swicher=1;
            $id="tr1";
        }
        else{
            $swicher=0;
            $id="tr2";
        }
    echo"<tr id='$id'><td>$row[0]</td><td>$row[1]</td>"
            . "<td><a href=#edite>Edit</a>||"
            . "<a href=#Delete href=#DeletePr onclick=allfuncp('mainb','admin/priority/','delete',$row[0])>Delete</a></td></tr>";
    }
echo"</table>";


?>

