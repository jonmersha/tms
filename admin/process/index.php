<?php
require_once '../../config/index.php';
$getmaxid="SELECT max(cod) from workunit";
  $maxresult=mysqli_query($con,$getmaxid);
  $rowmax=  mysqli_fetch_array($maxresult);
  $idmax=$rowmax[0]+1;
if($_GET[order]=='insert'){
    $message="Some fields are empty";
if($_GET[name]!=""||$_GET[loc]!=""){
  $sql="insert into workunit values($idmax,'$_GET[name]','$_GET[loc]',$_GET[ext])";
  //echo $sql;
  if(!mysqli_query($con,$sql)){
  $message=mysql_error ();}
  else{
  $message=mysql_affected_rows()."Department registered succefully";}
    
}

  }
if($_GET[order]=='delete'){
    $query="delete from workunit where cod=$_GET[cod]";
    if(!mysqli_query($con,$query)){
    $message= mysql_error();
}
}
?>
<form>
<table id="tab">
    
    <tr><td>Process Name</td><td><input type="text"id="names"/></td></tr>
    <tr><td>Location</td><td><input type="text"id="locations"/></td></tr>
    <tr><td>Ext</td><td><input type="text"id="ext"/></td></tr>
    <tr><td></td><td><input value='Save' type='button' onclick="validatedepartment('mainb','admin/process/','insert')"/></td></tr>
</table>
</form>
<div><?php echo $message; ?></div><hr>

<?php
$query="SELECT * FROM `workunit`";
$result=  mysqli_query($con,$query);
$swicher=0;
echo
"<table> 
    <tr id=tdt><td id=tdh>Process code</td><td id=tdh>Process Name</td><td id=tdh>Location</td> <td id=tdh> extention</td><td id=tdh></></tr>";
while($row=  mysqli_fetch_array($result)){
    if($swicher==0){
        $id="tr1";
        $swicher=1;}
    else {
        $id="tr2";
        $swicher=0;
    }

    echo"<tr id='$id'  ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td onclick=validatedepartment('mainb','admin/process/index.php?cod=$row[0]','delete')>delete</></tr>";
}
echo"</table>";

?>


