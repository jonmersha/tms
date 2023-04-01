<?php
require_once '../config/index.php';
$sql="SELECT * FROM `usercatagory`";
function getselection($con,$tablename){
    $sql="select * from $tablename";
    $result=  mysqli_query($con,$sql);
    $optcat="<option value='All'>All</option>";
    while($row=  mysqli_fetch_array($result)){
        $optcat=$optcat."<option value='$row[1]'>$row[1]</option>";
    }
    return $optcat;
}

                              getselection($con,'usercatagory');
                             

?>
</head>
<form>
    <table> 
        <tr>
            <td>Team</td>
            <td><select id='cat' ><?php echo getselection($con,'usercatagory');?></select></td>
            <td>Case Status</td>
            <td><select id="st">
                    <option value="All">All</option>
                    <option value="Closed">Closed</option>
                    <option value="Resolved">Resolved</option>
                    <option value="Assined">Active Case</option>
                </select></td>
        
            <td>Time interval between </td>
            
            <td><?php
				//get class into the page
				require_once('classes/tc_calendar.php');
				//instantiate class and set properties
				$myCalendar = new tc_calendar("date1", true);
				$myCalendar->setIcon("images/iconCalendar.gif");
				$myCalendar->setDate(1, 7, 2014);
				//output the calendar
				$myCalendar->writeScript();	  
				?></td>
            <td>and</td>
            <td> <?php
				//get class into the page
				require_once('classes/tc_calendar.php');
				//instantiate class and set properties
				$myCalendar = new tc_calendar("date2", true);
				$myCalendar->setIcon("images/iconCalendar.gif");
				$myCalendar->setDate(1, 1, 2015);
				//output the calendar
				$myCalendar->writeScript();	  
				?></td>
            <td><input type="button" value="Search" onclick="rptgenertate('rpt','managersReport/teamrpt.php')"/></td>
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

