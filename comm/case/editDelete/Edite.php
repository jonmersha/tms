<?php

  // require_once("../../..case/classes/newcase.php");
   require_once("../../../config/index.php");
   require_once("../../../function/allfunc.php");
$con=  mysql_connect($host,$username,$password);
session_start();

  

  $id=$_GET['caseid'];
  
getforms($id);
       
function getforms($id){
    $sql="select * from caselist where caseid=$id";
    $result=  mysql_query($sql);
    $row=  mysql_fetch_array($result);
    
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
                            <select id='pr'><option value='$row[7]'>$row[7]</option>".
                                    getselection('CasePriority').
                            "</select><br/>
                            <label>Category</label><br/>
                            <select id='cat' ><option value='$row[8]'>$row[8]</option>"
                              .getselection('usercatagory').
                             "</select><br/><br/><hr>
                            <div id='divid' align='center'>
                            <label>Service Requester</label><br/><input type='text' id='rq' value=$row[4] /><br/> 
                    <label>Department</label><br/>
                    <select id='dept'><option value='$row[5]'>$row[5]</option>".getselection('workunit').                
                            "</select><br/>
                    <label>Extension</label><br/>
                     <input type='text' id='ext' value=$row[6] /><br/><br/></div>
                        </td></tr>
                </table>
                
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <label><b>Case Title</b></label><br/>
                            <input id='caset' type='text' value='$row[1]' /><br/>
                            <label><b>Current Editor:</b>".$_SESSION['name']."</label><br/>
                                <label><b>Created By:</b>".creatorandtime($id)."</label><br/>
                             <label><h3>Description</h3></label><br/>
                             <textarea cols='30' rows='5' id='cased'>".trim($row[2])."</textarea><br/>
                             
                        </td>
                    </tr>
                </table>
                
            </td>
        </tr>";
                           
   echo $rs;

}
function getselection($tablename)
                {
                $sql="select * from $tablename";
                $result=  mysql_query($sql);
                $optcat="<option value='0'>Please select one</option>";
                while($row=  mysql_fetch_array($result))
                    {
                    $optcat=$optcat."<option value='$row[1]'>$row[1]</option>";
                    }
                    
               return $optcat;
}


?>
<tr><td><td>
   <input type='button' value='Re Create' id='button' onclick=RecreateCase('mainb','comm/case/editDelete/Recreate.php','<?php echo $_GET['caseid'];?>') />
    <input type='button' value='Save edite' id='button' onclick=RecreateCase('mainb','comm/case/editDelete/SaveEdite.php','<?php echo $_GET['caseid'];?>') /></tr>
    </form>
</table><div id='caseresponce'></div>



