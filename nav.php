<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php
  $show='hidden';
  $show1='hidden';
  $hide='';
  $style='';
  if($_SERVER['PHP_SELF']=="/web/login.php"){
}
if($_SERVER['PHP_SELF']=="/web/show.php"){
  $hide='hidden';
 $show='';
 $show1='';
}
if($_SERVER['PHP_SELF']=="/web/showorder.php" || $_SERVER['PHP_SELF']=="/web/purchase.php" || $_SERVER['PHP_SELF']=="/web/cart.php" ){
  $hide='';
 $show='';
 $show1='hidden';
 $style="style='padding-right:450px;'";



}

  ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark  sticky-top">

<a href='show.php'><img src="image/logo.jpg" width="60px"  ></a>
  <ul class="navbar-nav" style='padding-left:30px;'>
    <li class="nav-item mr-auto">
      <h1 style="color:white;">FARM TO FORK</h1><i style="color:orange;">grasp your grocery</i>
    </li>
  
 
   

   
  </ul>
  <p <?php echo $style;?>>
  <form class="form-inline " action="show.php" method="POST" style='padding-left:200px;' <?php echo $show1;?> >
    <input class="form-control "  type="text" name='name' placeholder="Search" >
    <button class="btn btn-success" type="submit" name='search'>Search</button>
  </form>
  <ul class="navbar-nav"  style='padding-left:250px;' <?php echo $show;?> >
  <li class="nav-item mr-auto">
    <br>
  <a href='cart.php'  ><i class="fa fa-shopping-cart"  title='showcart'style="font-size:36px;color:white;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href='showorder.php'  ><i class="fa fa-shopping-bag" title='showorder' style="font-size:36px;color:white;"></i></a>  &nbsp;&nbsp;&nbsp;&nbsp; 
  <a href='show.php' <?php echo $hide;?>>RETURN TO HOME </a> </li></ul> &nbsp;&nbsp;&nbsp;&nbsp; 
  <form  action="signup.php" method="POST" <?php echo $show1;?>> 
<br>
  <button class="rounded" name='logout' style='height:35px;background-color:red;border-color:red;' title='logout' type="submit"> <i class="fa fa-lock"></i></button></form>







        </P>

  
</nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>