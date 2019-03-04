var xmlHttp
function obrisi(str,red){
pomocna=parseInt(red)
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
alert ("Browser does not support HTTP Request")
return
}
var url="obrisi.php"
url=url+"?id="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged(){
if (xmlHttp.readyState==4){
if (xmlHttp.responseText==1){
//alert("Selektovana rezervacija je uspesno obrisana")
document.getElementById("ta").deleteRow(pomocna);
}}}
function GetXmlHttpObject(){
var xmlHttp=null;
try {
// Firefox, Opera 8.0+, Safari
xmlHttp=new XMLHttpRequest();
} catch (e) {
//Internet Explorer
try {
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}