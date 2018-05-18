// JavaScript Document
<!--
 
var speed=10;
 
var tab=document.getElementById("demo");
 
var tab1=document.getElementById("demo1");
 
var tab2=document.getElementById("demo2");
 
tab2.innerHTML=tab1.innerHTML;
 
function Marquee(){
 
if(tab2.offsetWidth-tab.scrollLeft<=0)
 
tab.scrollLeft-=tab1.offsetWidth
 
else{
 
tab.scrollLeft++;
 
}
 
}
 
var MyMar=setInterval(Marquee,speed);
 
tab.onmouseover=function() {clearInterval(MyMar)};
 
tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
 
-->
  <script type="text/javascript"> var ImageArray=new Array(5); ImageArray[0]="001.jpg"; ImageArray[1]="002.jpg";ImageArray[2]="003.jpg";ImageArray[3]="004.jpg";ImageArray[4]="005.jpg";
  </script>