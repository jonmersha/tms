/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function loadxml(loc,page){
    
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
xmlhttp.open("GET",page,true);
xmlhttp.send(); 
    
}
function allfunc(loc,page,order,form){
    
    if(form=='Team'&&order=='insert'){
    var qstr="?name="+Team.value+"&order="+order;
}
    if(form=='Team'&&order=='delete')
    {
        var qstr="&order="+order;
    }
    loadxml(loc,page+qstr);

}
function allfuncp(loc,page,order,form){
    var qstr;
    if(form=='pr'&&order=='insert'){
      qstr="?name="+priority.value+"&order="+order;
}
    if(order=='delete')
    {
         qstr="?order="+order+"&prid="+form;
     }
    loadxml(loc,page+qstr);
}

function RecreateCase(loc,page,id){
    var xmlhttp;
   // alert(page+id);
    var qs="?caseid="+id+"&pr=" +pr.value+"&cat="+cat.value+"&rq="+rq.value+"&dept="+dept.value+"&caset="+caset.value+"&cased=\n\
                    "+cased.value+"&ext="+ext.value;
    //alert(qs);
   // var qstr="?id="+id+"";
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
xmlhttp.open("GET",page+qs,true);
xmlhttp.send(); 
loadforms('mainb','comm/case/EditeDelete.php');
}

