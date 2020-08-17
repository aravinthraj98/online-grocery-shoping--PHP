<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      #myVideo {
  position: fixed;


  bottom: 0;
 min-width: 100%;
 max-height:100%;
}

/* Add some content at the bottom of the video/page */
.content {
  position: sticky;

  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}
      </style>
  </head>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <body  style="background-image:url(bg6.jpeg);background-repeat:no-repeat;background-size:cover;" >
   
    <?php 
include 'nav.php';
?>
      <video  playsinline autoplay muted loop id="myVideo" >
        <source src="bghome.mp4" type="video/mp4">
      </video>
      
        <div class="content">

    <div style="text-align:center;"><button type="submit" class="btn btn-primary" style="width:200px;" name="loginc"  onclick=loginp()>login</button>
    <button type="submit" class="btn btn-success" style="width:200px;" name="loginc" onclick=signup()>signup</button>
    <button type="submit" class="btn btn-info" style="width:200px;" name="loginc" onclick=logina()>admin</button>
 </div>

    <div class="container-fluid" style="padding:80px;width:500px;">
   
   
    <form action="signup.php" method="POST"style="display:none;" id="login">
   
  
    
NAME:<div class="form-group">
  <label for="username">username</label>
 <input type="text" class="form-control" name="name" id="username"  placeholder="username" required></div>
<div class="form-group">
  <label for="password">PASSWORD</label>
  <input type="password" class="form-control" name="password" id="password" placeholder="password" required><br>
</div>
 <input type="submit" class="btn btn-success form-control" value="login" name="login">
  
</form>
<form action="signup.php" method="POST" style="display:none;" id="signup"><br>
    NAME:
    <input type="text" name="name" class="form-control" placeholder="username" required><br>
   password: <input type="password" name="password" class="form-control" placeholder="password" required><br>
    cpassword: <input type="password" name="cpassword" class="form-control" placeholder="password" required><br>
    email:<input type="email" name="email" class="form-control" placeholder="email" required><br>
   phonenumber: <input type="tel" pattern=[0-9]{10} name="phone" class="form-control" placeholder="phonenumber" required><br>
   <input type="submit" value="signup" name="signup" class="form-control btn btn-success"></form>
   <form action="signup.php" method="POST" style="display:none;" id="admin"><br>
   NAME:
    <input type="text" name="name" class="form-control" placeholder="username" required><br>
   password: <input type="password" name="password" class="form-control" placeholder="password" required><br>
   <button type="submit" class="btn btn-success form-control" value="admin" name="login">login</button>
</form>


</div>
<script>
function loginp()
{
    
    document.getElementById('signup').style.display='none';
   document.getElementById('login').style.display='';
   document.getElementById('admin').style.display='none';

}
function signup(){
    document.getElementById('login').style.display="none";
    document.getElementById('signup').style.display='';
    document.getElementById('admin').style.display='none';

}
function logina(){
  document.getElementById('signup').style.display='none';
   document.getElementById('login').style.display='none';
   document.getElementById('admin').style.display='';
}


</script>

            </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
</html>

 <?php
if(isset($_GET['msg'])){

  $msg=$_GET['msg'];
  echo "<script>alert(".$msg.");</script>";
}
?>
