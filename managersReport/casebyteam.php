<?php
require_once '../config/index.php';
$sql="SELECT * FROM `usercatagory`";
function getselection($tablename){
    $sql="select * from $tablename";
    $result=  mysql_query($sql);
    $optcat="<option value='All'>All</option>";
    while($row=  mysql_fetch_array($result)){
        $optcat=$optcat."<option value='$row[1]'>$row[1]</option>";
    }
    return $optcat;
}

                              getselection('usercatagory');
                             

?>
<form>
    <table> 
        <tr>
            <td>Team</td>
            <td><select id='cat' ><?php echo getselection('usercatagory');?></select></td>
            <td>Case Statusnnn</td>
            <td><select id="st">
                    <option value="All">All</option>
                    <option value="Closed">Closed</option>
                    <option value="Resolved">Resolved</option>
                    <option value="Assined">Active Caserrrr</option>
                </select></td>
        
            <td>Time interval between hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</td>
             <?php
				//get class into the page
				require_once('classes/tc_calendar.php');

				//instantiate class and set properties
				$myCalendar = new tc_calendar("date2", true);
				$myCalendar->setIcon("images/iconCalendar.gif");
				$myCalendar->setDate(1, 1, 2012);
				//output the calendar
				$myCalendar->writeScript();	  
				?> 
            
            
            <td><input type="text" id="fdate"/></td>
            <td>and</td>
            <td><input type="text" id="ldate"/></td>
            <td><input type="button" value="Search" onclick="rptgenertate('rpt','managersReport/rptteam.php')"/></td>
        </tr>
    </table>
</form>
<hr>
<table width="100%">
    <tr width="100%">
        <td></td><td></td><td></td><td></td><td></td><td></td><td width="10%">Export To Pdf</td>
    </tr>
</table>
<hr>
<div id="rpt"></div>

