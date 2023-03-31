<?php 

   require_once("case/classes/newcase.php");
    require_once("../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con)
    {
    
    echo mysql_error();
   }
  mysql_select_db($dbname, $con);
  
  $caseid=new newcase();
  $id=$caseid->Getid($con);

  if($id<100)
      $nid="0000"."$id";
  else
     $nid="000"."$id";
  
  /*function getid(){
   $caseid ="select count(caseid) as id from DBESupport.caselist";
    $results=mysqli_query($con,$caseid); 
    $rows=mysqli_fetch_array($results);
    $row=$rows[0]+1;
    
    if($row<100)
        
    return"0000"."$row";
    if($row>99 && $row<1000)
   return"000".$row;
    
  }*/
//getforms($nid);
       
function getforms($id){
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
                                    getselection('CasePriority').
                            "</select><br/>
                            <label>Category</label><br/>
                            <select id='cat' >"
                              .getselection('usercatagory').
                             "</select><br/><br/><hr>
                            <div id='divid' align='center'>
                            <label>Service Requester</label><br/><input type='text' id='rq' /><br/> 
                    <label>Department</label><br/>
                    <select id='dept'>".getselection('workunit').                
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
                            <label><h3>Opened by:</h3></label><br/>
                             <label><h3>Description</h3></label><br/>
                             <textarea cols='30' rows='5' id='cased'></textarea><br/>
                             
                        </td>
                    </tr>
                </table>
                
            </td>
        </tr>";
                           
   echo $rs;

}
function getselection($tablename){
    $sql="select * from $tablename";
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



