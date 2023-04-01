<?php
try {
    

require_once("../config/index.php");
$query="select max(id) from createlist";
$result =  mysqli_query($con,$query);
$max =  mysqli_fetch_array($result);

$query="insert into createlist
SELECT `actions`.`caseid`,`actions`.`date`,`caselist`.`Catagory`
FROM actions
LEFT JOIN `caselist` ON `actions`.`caseid` = `caselist`.`caseid`
WHERE `actions`.`actionperformed` = 'create'and `actions`.`caseid`>$max[0]";
if(!mysqli_query($con,$query)){
    
    echo "inser not succefull";
}
$query="SELECT dateofcreation, count( id )
FROM createlist
GROUP BY `dateofcreation`";
$result=  mysqli_query($con,$query);
echo"<table ><tr><td id=tdh> case Creation Date</td><td id=tdh>number of Case in a day</td></tr>";
while($row=mysqli_fetch_array($result)){
    echo "<tr><td id=tr1> $row[0]</td><td id=tr2> $row[1]</td></tr>";
}
echo"</table>";
} catch (\Throwable $th) {
    echo $th;
}
        



