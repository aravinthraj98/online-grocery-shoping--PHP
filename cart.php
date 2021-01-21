<?php

include 'nav.php';

$servername = "localhost";
$username = "root";
$password = "";
$DB = "grocery";
$conn = new mysqli($servername, $username, $password, $DB);
session_start();
$cart="select * from cart having cname='$_SESSION[uname]'";
    
if(isset($_SESSION['uname'])){
    $product="select * from product";
    $show=$conn->query($cart);
    
   echo " <link href='navbar.css' rel='stylesheet'>";
   echo "<form action='purchase.php' method='POST'>";
    echo "<div class='grid-container'>";
   if($show->num_rows){
    while($row = $show->fetch_assoc()){
        $pname=$row['pname'];
            echo "<div class='grid-item'> 
        <form action = 'purchase.php' method='POST'>
    <img src=`image/.$row['img'].`><br>
    $row[pname]-$row[quantity]<br>
   
    
    <select name='$row[pname]' onchange='change(value,$row[cost],$row[pid]);'>
    <option value='0'>0</option>
     <option value='1'>1</option>
     <option value='2'>2</option>
     <option value='3'>3</option></select><br><br>
   <button type=text disabled style='background-color:greenyellow;border-color:greenyellow;border-radius:30%;'>price:₹ <i id=$row[pid]>$row[cost]</i></button>
    
        
          </div>";
    
 
 }echo "</div><br>";
 
 echo "<p style='text-align:center;'><input type='submit' style='width:100px;background-color:black;border-color:black;color:white;border-radius:5px;' value='order'></p>";
}
else{
    echo "NO ITEMS IN THE CART";
}
 
echo" <script> 
 function change(v,a,c){
    var cos=parseInt(v)*parseInt(a)
    document.getElementById(c).innerHTML = cos;} </script>  ";

    
    

        
        
   
}
else{
    header("location:../web/login.php");

}

?>