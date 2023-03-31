<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../../conf/index.php';
session_start();
?>
<table>
    <tr>
        <td>New Password</td><td><input type="password" id="pass"/></td>
    </tr>
    <tr>
        <td>Confirm Password</td><td><input type="password" id="confpass"/></td>
    </tr>
    <tr>
        <td></td><td><input type="button" id="pass" onclick="loadXMLDOc('mainb')"/></td>
    </tr>
</table>

