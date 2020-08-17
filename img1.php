<html>
<head>


 
</head>
<body onload = >
<img id="img" src="dairymilk.jpg" width='100'>
<script type = "text/javascript">
var images = [], x = 0;
images[0] = "carrot.jpg";
images[1] = "crab.jpg";
images[2] = "lemon.jpg";

changeImage();

function changeImage()
{
var img = document.getElementById("img");
img.src = images[x];
x++;

if(x >= images.length){
    x = 0;
} 
else{

setInterval(changeImage(), 1000);}
}   

  </script>
</body>
</html>