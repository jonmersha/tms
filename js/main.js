/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function loadXMLDoc(loc, page)
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    document.getElementById(loc).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",page,true);
xmlhttp.send();
}
////////////////////////////////////////
function prchange(loc, page)
{	
    //alert("alert");
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    document.getElementById(loc).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",page,true);
xmlhttp.send();
}
///////////////////////////////////////
function rptgenertate(loc, page)
{	
    //alert(date1.value);
    
var xmlhttp;
var qs;
qs="?catagory="+cat.value+"&status="+st.value+"&start="+date1.value+"&endedate="+date2.value;



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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    document.getElementById(loc).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",page+qs,true);
xmlhttp.send();
}
///////////////////////////////////////
function loadforms(loc,page){
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",page,true);
xmlhttp.send();   
}
//////////////////////////////////////////////////////////////////
function showhere(loc,page){
    var xmlhttp;
    var user="?user="+users.value+"&status="+statuss.value;
   // alert(user);
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",page+user,true);
xmlhttp.send();   
}

//////////////////////////////////////////////////////////////////////////
function changestatus(loc,page){
   // alert(page);
    var xmlhttp;
    page=page+"?caseid="+caseid.value;
   // alert(page);
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",page,true);
xmlhttp.send();   
}

///////////////////////////////////////////////////////////////////////////
function LoadMenu(location,mname)
{
//alert("well done");
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert(xmlhttp.responseText);
    document.getElementById(location).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",mname,true);
xmlhttp.send();
}


function UserForm(page,location){
var username=document.forms["usrfrm"]["username"].value;
var midname=document.forms["usrfrm"]["mname"].value;
var loginame=document.forms["usrfrm"]["log"].value;
var userp=document.forms["usrfrm"]["Process"].value;
var pw=document.forms["usrfrm"]["pw"].value;
var cpw=document.forms["usrfrm"]["cpw"].value;
var qstring="?username="+username+"&midname="+midname+"&loginame="+loginame+"&userp="+userp+"&pw="+pw;
var status="";

if(pw!=cpw){
 status="Passwords Miss match";
}

if(username==""){
  status=status+"\nusername empty";
}
if(midname==""){
status=status+"\nMidle Nameempty";

}
if(loginame==""){
status=status+"\nloginname=empty";
}
if(pw==""){
status=status+"\nemptypasswword";
}

if(status!=""){
//alert(status);
}
else{
//alert("success");
//compose query string

//alert("functioncall");
registration(page,location, qstring);
}


}
///****************************process registration*****************************************//

function proForm(page,location){
//alert("called");
var prn=document.forms["profrm"]["prn"].value;
//alert(prn);
var pro=document.forms["profrm"]["pro"].value;
var loc=document.forms["profrm"]["loc"].value;
var ext=document.forms["profrm"]["ext"].value;

var qstring="?prn="+prn+"&pro="+pro+"&loc="+loc+"&ext="+ext;
var status="";

if(prn==""){
  status=status+"\nprocess name empty";
}

if(status!=""){
//alert(status);
}
else{

//alert("functioncall");
registration(page,location, qstring);
}


}
//********************************************Registration form**************************************************//
function registration(page,loc, qstring)
{
//alert(qstring);	
//alert(page);
//alert(location);
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert(xmlhttp.responseText);
    document.getElementById(loc).innerHTML=xmlhttp.responseText;
        //document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",page+qstring,true);
xmlhttp.send();
}


	$(window).load(function() {
		$('#slider').nivoSlider({
			effect: 'random',
			directionNavHide: false,
			pauseOnHover: true,
			captionOpacity: 1,
			prevText: '<',
			nextText: '>'
		});
	});
        
        function testnew(){
            document.getElementById('intmailmess').innerHTML='User internal mail is is empty';
        }






