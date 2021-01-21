
<?php
session_start();
   if(isset($_SESSION['uname'])){

include 'nav.php';
   }



$servername = "localhost";
$username = "root";
$password = "";
$DB = "grocery";
$conn = new mysqli($servername, $username, $password, $DB);
$product="select * from product";
$sr='';
if(isset($_POST['search'])){
   $sr='no items match';
   $name=$_POST['name'];
   $product1="select * from product where pname='$name';";
   $show=$conn->query($product1);
   $product2="select * from product where pname like '$name%';";
   $show1=$conn->query($product2);
   if($show->num_rows>0){
     
      $product="select * from product where pname='$name';";
      $sr='';
 
   }
elseif($show1->num_rows>0){
   $sr='some items found';
   $product="select * from product where pname like '$name%';";

}
   
}


$show=$conn->query($product);
$filter='WELCOME';



if(isset($_POST['filter'])){
   $filter=$_POST['filter'];
   $product="select * from product where ptype='$filter';";
   $show=$conn->query($product);


  
      



   }


?>

 


 <html>
   <body>
   <!doctype html>
   <html lang="en">
     <head>
        <style>
           .pad{
              padding:35px;
             
           }
           .button1{
          width:230px;
           }
          .img img{
            height:200px;
          }
        </style>
       <title>Title</title>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     </head>
     <body>
        
       

     <form action="show.php" method="POST" style='padding-top:10px;'>

<span class='pad'><button type="submit" class="btn btn-secondary button1" name="filter" value='vegetable' >vegetable</button>
  <button type='submit' class="btn btn-success button1" name="filter" value='fruit'>fruits</button>
  <button type="submit" class="btn btn-info button1" name="filter" value='food'>food products</button>
  <button type="submit" class="btn btn-warning button1" name="filter" value='dairy'>dairy products</button>
  <button type='submit' class="btn btn-danger button1" name="filter" value='meat'>meat</button>
  <button type="submit" class="btn btn-dark button1" name="filter" value='drinks'>cooldrinks</button></span>
</form>
<p ><h1 style='color:green;text-align:center;'><?php echo $filter;?></h1></p>
         
       <!-- Optional JavaScript -->
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     </body>
   </html>
   <?php
   if(isset($_SESSION['uname'])){
      echo $sr;
   


   echo " <link href='navbar.css' rel='stylesheet'>";
   echo "<div class='grid-container'>";
while($row = $show->fetch_assoc()){
   $hide='';
   $stock='';
   if($row['stock']<=2){
   $hide='hidden';
    $stock='not in stock';}
 
   
echo "<div class='grid-item' style='height:400px;width:300;'> 
       <form action = 'show.php' method='POST'>
   <img src="image/.$row['img']." title='$row[pname]'><br> $row[pname]-$row[quantity]<br>";
    
   
        
        
      echo"    <input type ='submit' value = 'Add to Cart'  name=$row[pname] style='padding:5px;width:200px;outline:none' class='button' $hide></form>
          <button type=text disabled style='background-color:greenyellow;border-color:greenyellow;border-radius:30%; '>₹cost:$row[cost]</button><br>$stock </div>";


}echo "</div>";
   
   $cart="select * from cart where cname=$_SESSION[uname]";
  $product="select * from product";
    $show=$conn->query($product);
    while($row = $show->fetch_assoc()){
    $add=$row['pname'];
    if(isset($_POST[$add])){
        
         $cartinsert="insert into cart (cname,pname,cost,img,ptype,quantity)values('$_SESSION[uname]','$row[pname]','$row[cost]','$row[img]','$row[ptype]','$row[quantity]')";
         if($conn->query($cartinsert)===TRUE)
              echo "<script>alert('item added to cart');</script>";
        else
            echo "<script>alert('item already in cart');</script>";
}
}

}

else{
   header("location:../web/login.php");
}




?>