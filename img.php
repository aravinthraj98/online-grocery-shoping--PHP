<?php
$img=array('crab.jpg','fivestar.jpg','cauliflower.jpg','frooti.jpg');
function img(){
    echo 'hi';
};?>
<html><script>var img=['crab.jpg','fivestar.jpg','cauliflower.jpg','frooti.jpg']
var l=4;
var k=0;
myFunction();

function myFunction() {
    k=parseInt(k)+1;
    document.write(k);
    if(k<=parseInt(l)){
   document.write('<img src')

  setInterval(myFunction(), 3000);}
  else{
      alert('end');
  }
}

</script></html>

