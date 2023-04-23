<html>
	<head>
<SCRIPT LANGUAGE="JavaScript1.2">

/*
Analog Clock III- Kurt Grigg (kurt.grigg@virgin.net)
For full source code, 100's more DHTML scripts, and TOS,
visit http://www.dynamicdrive.com
*/

colors = new Array('330099','00ff00','ff00ff');  //Clock face colors.
sCol = 'ff00ff';  //seconds colour.
mCol = '00ff00';  //minutes colour.
hCol = 'red';  //hours colour.
//Alter nothing below!
H = '***';
H = H.split('');
H = H.reverse();
M = '****';
M = M.split('');
M = M.reverse();
S = '*****';
S = S.split('');
S = S.reverse();
dots = 12;
var Ypos = 0,Xpos = 0,Ybase = 0,Xbase = 0;
var ay = 0, ax = 0, Ay = 0, Ax = 0, by = 0, bx = 0, By = 0, Bx = 0, cy 
= 0, cx = 0, Cy = 0, Cx = 0, dy = 0, dx = 0, Dy = 0, Dx = 0;
count = 0;
count_a = 0;
move = 1;
ie4=document.all
ns = (document.layers)?1:0;

viz = (document.layers)?'hide':'hidden';
if (ns) {
for (i = 0; i < dots; i++)
document.write('<layer name=nface'+i+' top=0 left=0 bgcolor=#000099 clip="0,0,3,3"></layer>');
for (i = 0; i < S.length; i++)
document.write('<layer name=nx'+i+' top=0 left=0 width=36 height=36><font face=Verdana size=2 color='+sCol+'><center>'+S[i]+'</center></font></layer>');
for (i = 0; i < M.length; i++)
document.write('<layer name=ny'+i+' top=0 left=0 width=36 height=36><font face=Verdana size=2 color='+mCol+'><center>'+M[i]+'</center></font></layer>');
for (i = 0; i < H.length; i++)
document.write('<layer name=nz'+i+' top=0 left=0 width=36 height=36><font face=Verdana size=2 color='+hCol+'><center>'+H[i]+'</center></font></layer>');
}
else if (ie4){
document.write('<div id="W" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i = 0; i < dots; i++) {
document.write('<div id="face" style="position:absolute;top:0px;left:0px;width:3px;height:3px;font-size:3px;background:#000099"></div>');
}
document.write('</div></div>');
document.write('<div id="X" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i = 0; i < S.length; i++) {
document.write('<div id="x" style="position:absolute;width:36px;height:36px;font-family:Verdana;font-size:12px;color:'+sCol+';text-align:center;padding-top:10px">'+S[i]+'</div>');
}
document.write('</div></div>')
document.write('<div id="Y" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i = 0; i < M.length; i++) {
document.write('<div id="y" style="position:absolute;width:36px;height:36px;font-family:Verdana;font-size:12px;color:'+mCol+';text-align:center;padding-top:10px">'+M[i]+'</div>');
}
document.write('</div></div>')
document.write('<div id="Z" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
for (i = 0; i < H.length; i++) {
document.write('<div id="z" style="position:absolute;width:36px;height:36px;font-family:Verdana;font-size:12px;color:'+hCol+';text-align:center;padding-top:10px">'+H[i]+'</div>');
}
document.write('</div></div>');
}
if (ns) {
window.captureEvents(Event.MOUSEMOVE);
function nsMouse(evnt) {
Ypos = evnt.pageY + 100;
Xpos = evnt.pageX + 100;
}
window.onMouseMove = nsMouse;
}
else if (ie4){
function ieMouse() {
Ypos = event.y + 100;
Xpos = event.x + 100;
}
document.onmousemove = ieMouse;
}
function clock() {
time = new Date ();
secs = time.getSeconds();
sec = -1.57 + Math.PI * secs / 30;
mins = time.getMinutes();
min = -1.57 + Math.PI * mins / 30;
hr = time.getHours();
hrs = -1.575 + Math.PI * hr / 6 + Math.PI * parseInt(time.getMinutes()) 
/ 360;
Ybase = 15;
Xbase = 15;

if (ns) {
document.layers["nx"+0].visibility = viz;
document.layers["ny"+0].visibility = viz;
document.layers["nz"+0].visibility = viz;
for (i = 0; i < S.length; i++) {
document.layers["nx"+i].top = ay - 12 + (i * Ybase) * Math.sin(sec);
document.layers["nx"+i].left = ax - 12 + (i * Xbase) * Math.cos(sec);
}
for (i = 0; i < M.length; i++) {
document.layers["ny"+i].top = by - 12 + (i * Ybase) * Math.sin(min);
document.layers["ny"+i].left = bx - 12 + (i * Xbase) * Math.cos(min);
}
for (i = 0; i < H.length; i++) {
document.layers["nz"+i].top = cy - 12 + (i * Ybase) * Math.sin(hrs);
document.layers["nz"+i].left = cx - 12 + (i * Xbase) * Math.cos(hrs);
}
for (i = 0; i < dots; ++i) {
document.layers["nface"+i].top = dy - 2 + (70 * 
Math.sin(-0.49+dots+i/1.9));
document.layers["nface"+i].left = dx + 4 + (70 * 
Math.cos(-0.49+dots+i/1.9));
   }
}
else if (ie4) {
var scrll = document.body.scrollTop;
W.style.pixelTop = scrll;
X.style.pixelTop = scrll;
Y.style.pixelTop = scrll;
Z.style.pixelTop = scrll;
x[0].style.visibility=viz;
y[0].style.visibility = viz;
z[0].style.visibility = viz;
for (i = 0; i < S.length; i++) {
x[i].style.pixelTop = ay - 12 + (i * Ybase) * Math.sin(sec);
x[i].style.pixelLeft = ax - 12 + (i * Xbase) * Math.cos(sec);
}
for (i = 0; i < M.length; i++) {
y[i].style.pixelTop = by - 12 + (i * Ybase) * Math.sin(min);
y[i].style.pixelLeft = bx - 12 + (i * Xbase) * Math.cos(min);
}
for (i = 0; i < H.length; i++) {
z[i].style.pixelTop = cy - 12 + (i * Ybase) * Math.sin(hrs);
z[i].style.pixelLeft = cx - 12 + (i * Xbase) * Math.cos(hrs);
}
for (i = 0; i < dots; ++i) {
face[i].style.pixelTop = dy + 6 + (70 * Math.sin(-0.49 + dots + i / 
1.9));
face[i].style.pixelLeft = dx + 4 + (70 * Math.cos(-0.49 + dots + i / 
1.9));
      }
   }
}
function MouseFollow() {
ay = Math.round(Ay += ((Ypos) - Ay) * 4 / 15);
ax = Math.round(Ax += ((Xpos) - Ax) * 4 / 15);
by = Math.round(By += (ay - By) * 4 / 15);
bx = Math.round(Bx += (ax - Bx) * 4 / 15);
cy = Math.round(Cy += (by - Cy) * 4 / 15);
cx = Math.round(Cx += (bx - Cx) * 4 / 15);
dy = Math.round(Dy += (cy - Dy) * 4 / 15);
dx = Math.round(Dx += (cx - Dx) * 4 / 15);
clock();
setTimeout('MouseFollow()',10);
}

function StartAll() {
MouseFollow();
}
if (document.layers || document.all) window.onload = StartAll;
//  End -->
</script>
</head>
<body>

</body> 
</html>