<?php
   require_once("../case/classes/newcase.php");
   
try {
    require_once("../config/index.php");

   $caseid=new newcase();
 $id=$caseid->Getid($con);
  
    session_start();
if(!$con)
    {
    echo mysql_error();
   }
  

  if($id<100)
      $nid="0000"."$id";
  else
     $nid="000"."$id";
  
getforms($con,$nid);
   
} catch (\Throwable $th) {
    echo $th;
}

function getforms($con,$id){
    $rs="<table>
        <form>
        <tr width='500px'> 
            <td width='200px' align='center'>
                <table>
                    <tr valign='top'>
                        <td valign='top'>
                            <label> CaseID</label>
                            <label><h1>".$id."</h1></label>
                            <label>Priority</label><br/>
                            <select id='pr'>".
                                    getselection($con,'CasePriority').
                            "</select><br/>
                            <label>Category</label><br/>
                            <select id='cat' >"
                              .
                              getselection($con,'usercatagory').
                             "</select><br/><br/><hr>
                            <div id='divid' align='center'>
                            <label>Service Requester</label><br/><input type='text' id='rq' /><br/> 
                    <label>Department</label><br/>
                    <select id='dept'>".
                     getselectionp($con,'workunit').                
                            "</select><br/>
                    <label>Extension</label><br/>
                     <input type='text' id='ext' /><br/><br/></div>
                        </td></tr>
                </table>
                
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <label>Case Title</label><br/>
                            <input id='caset' type='text'/><br/>
                            <label><h3>Opened by:".$_SESSION['name']."</h3></label><br/>
                             <label><h3>Description</h3></label><br/>
                             <textarea cols='30' rows='5' id='cased'></textarea><br/>
                             
                        </td>
                    </tr>
                </table>
                
            </td>
        </tr>";
                           
   echo $rs;

}
function getselection($con,$tablename){
    
    $sql="select * from $tablename";

     $result = mysqli_query($con,$sql);
    $optcat="<option value='0'>Please select one</option>";
     while($row=  mysqli_fetch_array($result)){
         $optcat=$optcat."<option value='$row[1]'>$row[1]</option>";
     }
    return $optcat;
}
function getselectionp($con,$tablename){
    $sql="select * from $tablename ORDER BY `workunit`.`name` ASC";
    $result=  mysqli_query($con,$sql);
    $optcat="<option value='0'>Please select one</option>";
    while($row=  mysqli_fetch_array($result)){
        $optcat=$optcat."<option value='$row[1]'>$row[1]</option>";
    }
    return $optcat;
}

?>
<tr><td><td><input type='button' value='CreateCase' id='button' onclick="casevalidation()"/></tr>
    </form>
</table><div id='caseresponce'></div>



