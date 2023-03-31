<?php
require_once '../config/index.php';
require_once '../function/allfunc.php';
session_start();
echo "<b align='left'>Cases Weghiting For Close Confirmation</b>".closenotification();
function closenotification(){
                    $id=$_SESSION['userid'];
                    //echo $id;
                    $query="SELECT * FROM `ResolvedReport`  where Conformationstatus=0 and Repertedto=$id ORDER BY `ResolvedReport`.`Caseid` DESC";//selects caseids
                    $result=  mysqli_query($con,$query);
                    $rs=$rs. "<table width=100%><tr>"
                            . "<td id=tdh>Case Id</td>"
                            . "<td id=tdh>Title</td>"
                            . "<td id=tdh>Opened By</td>"
                            . "<td id=tdh>Resolved By</td>"
                            . "<td id=tdh>Priority</td></tr>";
                    $swicher=0;
                    while($row=  mysqli_fetch_array($result)){ 
                        if($swicher==0){
                            $tr="tr1";
                            $swicher=1;
                        }
                        else {
                            $tr="tr2";
                            $swicher=0;
 }
                        $query4="select * from caselist where caseid=$row[0]";//to get case details
                        $result4=mysqli_query($con,$query4);
                        $row4=mysqli_fetch_array($result4);
                        $rs=$rs. "<tr id=$tr onclick=loaddetails('mainb','leader/resolveDetail.php',$row4[0])>"
                                . "<td>$row4[0]</td>"
                                . "<td>$row4[1]</td>"
                                . "<td>".opners($row4[0])."</td>"
                                . "<td>".resolver($row[0])."</td>"
                                . "<td>$row4[7]</td></tr>";
                    
                       // case Titile openedby resolved by 
                        
                        
                    }
                    $rs=$rs."</table>";
                    return $rs;
                }
                function resolver($caseid){
                    $query2="select * from actions where caseid=$caseid and actionperformed='Resolve'";//to get reporter id
                        $result2=mysqli_query($con,$query2);
                        $row2=mysqli_fetch_array($result2);
                        
                        $query3="select * from users where userid=$row2[1]";//to get loaddetails('mainb','leader/save/confirmAction.php',$id)reporter details
                        $result3=mysqli_query($con,$query3);
                        $row3=mysqli_fetch_array($result3);
                        return $row3[2]." ".$row3[3]." on ".$row2[3];
                    
                }
                function opners($caseid){
                    $query2="select * from actions where caseid=$caseid and actionperformed='create'";//to get reporter id
                        $result2=mysqli_query($con,$query2);
                        $row2=mysqli_fetch_array($result2);
                        
                        $query3="select * from users where userid=$row2[1]";//to get reporter details
                        $result3=mysqli_query($con,$query3);
                        $row3=mysqli_fetch_array($result3);
                        return $row3[2]." ".$row3[3]." on ".$row2[3];
                    
                }