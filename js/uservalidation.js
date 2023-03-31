
function userv(){ 
    var status="";
     if(intmail.value===""){
        document.getElementById('intmailmess').innerHTML='User internal mail is is empty';
        status='x';
    }
    if(pass.value!==passconf.value)
    {
        document.getElementById('passconfmess').innerHTML='password mis much';
        status='x';
    }
    if(uid.value===""){
        status='x';
       document.getElementById('uidmess').innerHTML="user id is mandatory field";  
    }
    if(uname.value===""){
        status='x';
       document.getElementById('unamemess').innerHTML="user id is mandatory field";  
    }
    if(fname.value==="")
    {
        document.getElementById('fnamemess').innerHTML='First name is empty';
        status='x';
    }
    if(lname.value==="")
    {
        document.getElementById('lnamemess').innerHTML='Last name is empty';
    status='x';
    }if(ext.value==="")
    {
        document.getElementById('extmess').innerHTML='Extention number is empty';
        status='x';
    }
    if(mname.value===""){
        status='x';
        document.getElementById('mnamemess').innerHTML='midle name is empty';
    }
    if(department.value==="")
    {
        document.getElementById('departmentmess').innerHTML='User deparment is empty';
    status='x';
}
    if(ext.value==="")
    {
        document.getElementById('extmess').innerHTML='Extention number is empty';
        status='x';
    }
    
        
    if(oltmail.value==="")
    {
        document.getElementById('oltmailmess').innerHTML='alternate mail  is empty';
        status='x';
    }
    if(tele.value===""){
        document.getElementById('telemess').innerHTML='mobile number is empty name is empty';
    status='x';
    }
    if(pass.value===""){
        document.getElementById('passmess').innerHTML='user password field is empty';
    status='x';
    }
   
 if(status===""){
       var qstring="?userid=" +uid.value+"&username="+uname.value+"&firstname=\n\
                    "+fname.value+"&midlename="+mname.value+"&lastname="+lname.value+"&department=\n\
                    "+department.value+"&extention="+ext.value+"&internalmail="+intmail.value+"&oltmail=\n\
                    "+oltmail.value+"&telephone="+tele.value+"&password="+pass.value;
    user_registraton('rsponce','administration/regrisponce.php', qstring);
    }
    
        

}
function user_registraton(loc,page, qstring)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstring,true);
xmlhttp.send();
}
//////////////////////////////////////////////
function optuser(loc,page)
{
    //alert("hi");
var qstr="?team="+cat.value;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
}
////////////////////////////////////////////////////////////////////////////
function Teausercaase(loc,page)
{
    //alert("hi");
var qstr="?team="+cat.value+"&user="+st.value+"&status="+stcas.value+"&start="+fdate.value+"&enddate="+ldate.value;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
}

//////////////////////////////////////////

function casevalidation(Registeredvy){
    var qstring="?pr=" +pr.value+"&cat="+cat.value+"&rq="+rq.value+"&dept="+dept.value+"&caset="+caset.value+"&cased=\n\
                    "+cased.value+"&ext="+ext.value;
    loadXMLDoc('mainb','homes/creatorhome.php');
    user_registraton('caseresponce','creator/', qstring);
    
}

function validatecat(){
     var qstring="?catname="+catname.value;
    user_registraton('frmcat','administration/rspcat.php', qstring);
    
    
}
function validatepr(){
     var qstring="?prname="+prname.value;
    user_registraton('frmpr','case/rspcasepriority.php', qstring);
   // alert("script");
    
}
///////////////////////////////////////////////////////////////////////////////////////////////////////
function changestatus(loc,page,id){
   // alert(id);    
    var qstring="?team="+id;
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstring,true);
xmlhttp.send();
    
    
}
function changestatus2(loc,page,id){
   // alert(id);    
    var qstring="?team="+id+"&caseid="+caseid.value;
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstring,true);
xmlhttp.send();
    
    
}
///////////////////////////////////////////////////////////////////////////////////////////////////////
function getuser(page,loc,id){
    var qstring="&id="+id;
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstring,true);
xmlhttp.send();
    
    
}
//////////////////////////////
function loadviews(loc,page){
//alert(loc)
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page,true);
xmlhttp.send();
    
    
}
/////////////////////////////////////////////////////////////////////////////
function Assignment(page,loc){
    var qstring="?userid="+userid.value+"&caseid="+caseid.value;
    //alert("UserId="+userid.value+"\nCaseId="+caseid.value);
   //alert("is Called");
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstring,true);
xmlhttp.send();  
    
}

function loaddetails(loc,page,id){
     var xmlhttp;
     var qstr="?caseid="+id;
     
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();    
}
function Assigncase(loc,page,id)
{
    //alert(userid.value);
     var xmlhttp;
     var qstr="?caseid="+id+"&userid="+userid.value;
     //alert(qstr);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();    
}
function usersaveedite(loc,page,caseid,userid){
     var xmlhttp;//Support/save/edite.php?caseid=8&userid=1&desc=yes Support/save/edite.php
     
     var qstr="?caseid="+caseid+"&userid="+userid+"&desc="+edite.value;
     alert(page+qstr);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
    
}
function adduserany(loc,page,type,confirm){
    
    var xmlhttp;
  var qstr="?loginname="+loginName.value+"&firstname="+firstName.value+"&midlename="+midleName.value+"&lastname="+lastName.value+"&team="+team.value+"&mob="+mob.value+"&emailint="+email.value+"&emailp="+emailp.value+"&extention="+ext.value+"&confirmaton="+confirm+"&password="+pass.value+"&conpass="+conpass.value;
     alert(qstr);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
       
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
    
}
///////////////////////////////update users
function updateusersfull(loc,page){
    
    //var xmlhttp;
var qstr="&loginname="+loginName.value+"&firstname="+firstName.value+"&midlename="+midleName.value+"&lastname="+lastName.value+"&team="+team.value+"&mob="+mob.value+"&emailint="+email.value+"&emailp="+emailp.value+"&extention="+ext.value;
     //alert(qstr);
 var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
    
}
/////////////////////////////////////////////////////////////////////////////////////////////
function updateusersfullany(loc,page){
    
var qstr="?userid="+uid.value+"&loginname="+loginName.value+"&firstname="+firstName.value+"&midlename="+midleName.value+"&lastname="+lastName.value+"&team="+team.value+"&mob="+mob.value+"&emailint="+email.value+"&emailp="+emailp.value+"&extention="+ext.value;
     
 var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
    
}
//////////////////////////////////////////////////////////////////////////////////////////////////////
function changePassword(loc,page){
   // alert("qstr");
   var qstr="?oldpassword="+oldp.value+"&newPassword="+newp.value+"&newPasswordConfirm="+newpc.value; 

    var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
    
}
//////////////////////////////////////////////////////////////////////////////////////////////////
function userconfirm(loc,page){
    //alert(page);
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page,true);
xmlhttp.send();
    
}
function validatedepartment(loc,page,order){
    
    if(order=='insert')
    var qstr="?name="+names.value+"&loc="+locations.value+"&ext="+ext.value+"&order="+order;
else{
    var qstr="&order="+order;
   // alert(page+qstr);
    }
    
     
    //alert(qstr);
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();
    
    
}
//////////////////////////////////////add case priority 
function addpriority(loc,page){
   //alert(loc+page);
    var qstr="?id="+id.value+"&priority="+priority.value;
     
    //alert(qstr);
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();    
}

function confirmation(loc,page){
    var qstr="&dsk="+dsk.value;
   // alert(page+qstr);
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
        //alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();  
}
function privilageseter(loc,page,id){
 var qstr="?id="+id;
    //alert(page+qstr);
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
       // alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstr,true);
xmlhttp.send();     
    
}
function deletepr(loc,page){
    //var qstr="?id="+id;
    //alert(page+qstr);
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status==200)
    {
       // alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page,true);
xmlhttp.send(); 
}

