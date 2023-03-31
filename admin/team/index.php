
 <?php
require_once '../../config/index.php';
///echo $_GET[order];
if($_GET[order]=='insert'){
if($_GET[name]!=""){
  $getmaxid="SELECT max(catid) from usercatagory";
  $maxresult=mysqli_query($con,$getmaxid);
  $rowmax=  mysqli_fetch_array($maxresult);
  $idmax=$rowmax[0]+1;
    $query="insert into usercatagory values($idmax,'$_GET[name]')";
    if(!mysqli_query($con,$query)){
        $message=  mysql_error();
    }
    
}
 else {
    echo"Same fields are empty";
}

    }
   if($_GET[order]=='delete'){
      // echo $_GET[order];
    $query="delete from usercatagory where catid=$_GET[id]";
    if(!mysqli_query($con,$query)){
        echo mysql_error();
   }
   
    }
?>
<table id="tab">
    <tr>
        <td>Team Name</td><td><input type="text" id="Team"></td>
    </tr>
    <tr>
        <td></td><td alignment="center"><input type="button" value="Save" onclick="allfunc('mainb','admin/team/','insert','Team')"/></td>
        
    </tr>
</table>
<div><?php echo $message.$query; ?></div><hr>
<?php
$query="select * from usercatagory";
$result=  mysqli_query($con,$query);
$swicher=0;
echo"<table  id=tab>
  <tr><td id=tdh>TeamId</td><td id=tdh>TeamName</td><td id=tdh></th></tr></thead><tbody>";
    while($row=  mysqli_fetch_array($result)){
        if($swicher==0){
            $swicher=1;
            $id="tr1";
            
        }
        else{
            $swicher=0;
            $id="tr2";
            
        }
    echo"<tr id=$id><td>$row[0]</td><td>$row[1]</td><td><a href=#edite>Edit</a>||<a href=#Delete onclick=allfunc('mainb','admin/team/?id=$row[0]','delete','Team')>Delete</a></td></tr>";
    }
echo"</table>";
?>

                   