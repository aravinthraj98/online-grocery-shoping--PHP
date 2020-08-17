<?php
include 'nav.php';
$servername = "localhost";
$username = "root";
$password = "";
$DB = "grocery";
$conn = new mysqli($servername, $username, $password, $DB);
session_start();
$totalpurchase=0;

if(isset($_SESSION['uname'])){
$cart="select * from cart having cname='$_SESSION[uname]'";
$ordno=1;
while(TRUE){

$sql="select * from purchasedetail where ordno=$ordno";
$row=$conn->query($sql);
if($row->num_rows){
    $ordno=$ordno+1; 
    continue;}
else
     $o=$ordno;  
      break;   
} 
    
if($_SESSION['uname']){
    $product="select * from product";
    $show=$conn->query($cart);
    
   echo " <link href='navbar.css' rel='stylesheet'>";
   echo "<form action='purchase.php' method='POST'>";
    echo "<div class='grid-container'>";

    while($row = $show->fetch_assoc()){
        $pname=$row['pname'];

        if(isset($_POST[$pname])){
            $Q=$_POST[$pname];
            if($Q!='0'){
            
                $cost=$Q*$row['cost'];
                $totalpurchase=$totalpurchase+$cost;
                $purchaseinsert="insert into purchasedetail (cname,pname,cost,quantity,ordno)values('$_SESSION[uname]','$row[pname]','$cost','$Q','$o')";
                if($conn->query($purchaseinsert)===TRUE){
                    $product="update product set stock=stock-$Q where pname='$row[pname]'";
                    $conn->query($product);
                   
                    
                    
                echo "<img src=$row[img]>
                      <h4>product:$row[pname]<br>
                       price of $row[quantity]:$row[cost]<br>
                       QUANTITY YOU ORDERED:$Q<br>
                       TOTALCOST:₹ $cost</h4>
                       ";}}}


        else
            echo "<script>window.prompt('not succexss');</script>";
            
        }
        echo "<br></div><h3><p  style='text-align:center'>";
        if($totalpurchase>=1){
        echo "TOTALAMOUNT:₹  ".$totalpurchase."</p></h3>";}
        else{
           echo"NO QUANTITY HAS BEEN CHOOSEN </p></h3>";
        }

        }

    }
    

else{
    header("location:../web/login.php");
}
