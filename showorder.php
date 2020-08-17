<?php
include 'nav.php';
?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      #myVideo {
  position: fixed;


 min-width: 100%;
 height:100%;
}

/* Add some content at the bottom of the video/page */
.content {
  position: sticky;
  left:100;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  padding-left:30px;

  
}
tr:hover{
  background-color:white;
 color:black;
}
      </style>
</head>
<body style="background-color:black;">
<video  playsinline autoplay muted  id="myVideo" >
        <source src="s2.mp4" type="video/mp4">
      </video>
      
  
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "grocery";
$conn = new mysqli($servername, $username, $password, $DB);
session_start();
echo '    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
';



if(isset($_SESSION['uname'])){
  if(isset($_POST['cancelitem'])){
    $name=$_SESSION['uname'];
    $ordno=$_POST['ordno'];
    $pname=$_POST['cancelitem'];
    $del="delete from purchasedetail where ordno=$ordno and pname='$pname'";
    if($conn->query($del)===TRUE)
    {
      echo "<script>alert('item successfully removed');</script>";
    }
    else{
      echo "<script>alert('no has been cancelled');</script>";
    }
  
  }
$sql="select * from purchasedetail where cname='$_SESSION[uname]'";
$show=$conn->query($sql);
if(isset($_POST['filter'])){
  $sql="select * from purchasedetail where cname='$_SESSION[uname]' and status='$_POST[filter]'";
  $show=$conn->query($sql);
}
$a=[];



if($show->num_rows){

    while($row = $show->fetch_assoc()){
     
      if (in_array($row['ordno'],$a)){
        continue;
                 }
      else{
        array_push($a,$row['ordno']);
  }

                   
  
    }
    echo "<div class='content'>
    <div class='grid-container' style='width:60%;padding-left:300px;'>
    ";
  echo "<form action='showorder.php' method='POST'>
     <button type='submit' name='filter' value='cancelled' style='background-color:red;border-color:red;border-radius:10px;;'>show cancelled</button>
     <button type='submit' name='filter' value='delivered' style='background-color:green;border-color:green;border-radius:10px;;'>show deliveres</button>
     <button type='submit' name='filter' value='tobedelivered' style='background-color:yellow;border-color:yellow;border-radius:10px;;'>show tobedelivered</button>

     </form>";
    foreach($a as $ord){
      $b=[];
      $count=0;
$sql1="select * from purchasedetail where ordno=$ord";
echo "orderno: ";
echo $ord;
echo "<br>";



$show1=$conn->query($sql1);
if($show1->num_rows){
    while($row = $show1->fetch_assoc()){
      $sql2="select img from product where pname='$row[pname]'";
      $I=$conn->query($sql2);
      while($image = $I->fetch_assoc()){
        array_push($b,$image['img']);}
      }
      
$show1=$conn->query($sql1);



    
      foreach($b as $img){

        echo "<img src='$img' style='width:100px;height:100px;'>";
      }   
      echo "<br>";
      $totalcost=0;
      $items=0;
      echo "<table class='table table-borderless ' style='color:white;'>";
      echo "<tr><th>product</th><th>quantity</th><th>priceperitem</th><th>total</th></tr>";
      
      while($row = $show1->fetch_assoc()){
        $items=$items+1;
       
  
    echo "<tr><td>$row[pname]</td>";
    
    echo "<td>$row[quantity]</td>";
    $price=$row['cost']/$row['quantity'];
    $ordno=$row['ordno'];

    echo "<td>₹$price</td>";
    
    echo "<td>₹$row[cost]</td>";
    echo "<td><form action='showorder.php' method='POST'>
    <input type='number' name='ordno' hidden value=$ordno> 
    <button type='submit' value='$row[pname]' id='$row[id]'  name='cancelitem' style='float:right;border-color:orange;background-color:orange;width:100px;border-radius:10px;'>removeitem</button>";
    echo "</form></td></tr>";
    $totalcost=$totalcost+$row['cost'];
    $date=$row['orderon'];
   
    $status=$row['status'];
    if($status=="cancelled" || $status=="delivered"){
      echo "<script>
   document.getElementById('$row[id]').style.display='none';</script>"  ;

    }


    
}
echo "<tr><th>total items:</th><th>$items</th><td style='color:green'><b>totalcost:</b></td>
<td><h5>₹$totalcost</h5></td></tr>";
echo "</table>";

echo '<br>';
}

  if($status=="tobedelivered"){
echo "<br><form action='signup.php' method='POST'><p style='padding-right:auto;padding-left:5px;'><button type='submit' value=$ordno name='cancelorder' style='float:right;border-color:red;background-color:red;border-radius:10px;'>cancelorder</button></p></form><br>";
$count=1;}
 elseif($status=="delivered"){
  echo "<b style='color:green;'>order deliveres</b>";

 } 
else{
  
  echo "<b style='color:red;'>order cancelled</b><br>";
  $count=1;
}

   echo "orderedon :".$date;
    
    echo "<hr style='height:4px;background-color:green;width:150%;'>";


}
echo "</div></div>";
    }
    else{
      echo "<script>alert('no orders to be shown ');</script>";
    }


if(isset($_GET['ordno'])){
  echo "<script>alert('order no $_GET[ordno] has been cancelled');</script>";
}
}





else{
    header("location:../web/login.php");

}
?>