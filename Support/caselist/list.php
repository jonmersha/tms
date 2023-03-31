<?php
require_once("../../config/index.php");
require_once '../../function/allfunc.php';
session_start();


?>
<table width=100%><tr>
        <td>
            <?php  echo "<div id=link align='center' onclick=loadXMLDoc('mainb','creator/listeach.php?status=Assined')>Active Case</div>".GetUserCAse('Assined');?>
            <?php  echo "<div id=link align='center' onclick=loadXMLDoc('mainb','creator/listeach.php?status=Resolved')>Resolved</div>".GetUserCAse('Resolved');?> 
            <?php echo "<div id=link align='center' onclick=loadXMLDoc('mainb','creator/listeach.php?status=Closed')>Closed</div>".GetUserCAse('Closed');?>
        </td>
</tr>
</table>


