
<?php
session_start();
if(!isset($_SESSION['admin'])){
       header("location:../web/login.php?");}


        if(isset($_GET['msg']) || isset($_POST['update1']) || isset($_POST['find1']) ||isset($_GET['product'])){
            echo "<script>
            var a=1;
        
            

            
           </script> ";
        }
        else{
            echo "<script>var a=0;</script>";
        }
echo " <script>var images=['bg5.jpg','saleicon.jpg','saleicon1.jpg','saleicon2.jpg','saleicon3.jpg','saleicon4.jpg','logo.jpg'];
var i = 0;
var renew = setInterval(function(){
    
  
   
    if(images.length == i || a==1){
      
        document.getElementById('button').style.display='';
     
        renew=undefined;
        delete(renew);
      



    }
    else {
    document.getElementById('button').style.display='none';
    document.getElementById('bannerImage').src = images[i]; 
   
    i++;

}
},1000);
function product(){
    document.getElementById('add').style.display='';
    
    document.getElementById('cost').style.display='none';
    document.getElementById('stock').style.display='none';
    document.getElementById('find').style.display='none';
    document.getElementById('update').style.display='none';
    document.getElementById('find1').style.display='none';

}
function stock(){
    document.getElementById('add').style.display='none';
    document.getElementById('cost').style.display='none';
    document.getElementById('stock').style.display='';
    document.getElementById('find').style.display='none';
    document.getElementById('update').style.display='none';
    document.getElementById('find1').style.display='none';

  

}
function cost(){
    document.getElementById('add').style.display='none';
    document.getElementById('cost').style.display='';
    document.getElementById('stock').style.display='none';
    document.getElementById('find').style.display='none';
    document.getElementById('update').style.display='none';
    document.getElementById('find1').style.display='none';


}
function showpurchase(){
    document.getElementById('add').style.display='none';
    document.getElementById('cost').style.display='none';
    document.getElementById('stock').style.display='none';
    document.getElementById('find').style.display='';
    document.getElementById('find1').style.display='';

    document.getElementById('update').style.display='none';

}
function showcustomer(){
    document.getElementById('add').style.display='none';
    document.getElementById('cost').style.display='none';
    document.getElementById('stock').style.display='none';
    document.getElementById('find').style.display='none';
    document.getElementById('update').style.display='';
    document.getElementById('find1').style.display='none';


}
</script>";
?>


    <!doctype html>
    <html lang="en">
      <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            .wid{
                width:auto;
            }
            .wid:hover{
                background-color: burlywood;
            }
            tr:hover{
                background-color:white;
                color:black;
            }
           
        </style>
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
     <body style='background-image:url(adminbg.jpg);background-repeat:no-repeat;background-size:cover;'>
     <br>
     <br>
        <div class="container" style="background-color: rgba(0, 0, 0,0.5);padding:50px;max-width:750px;">
        <h1 style='color:white;text-align:center;'>FARM TO FORK</h1>
        <p style="padding-top:20px;text-align:right;"><a href="signup.php?admin='out'" class="btn btn-danger button1 wid">logout</a>
<br>
            <p style="text-align:center;padding-top:70px;height:200px;" id='img'> <img id="bannerImage" src="logo.jpg" style="width:200px;max-height:200px;">
            </p>
            <p id="button" style="padding-top:40px;display:none;text-align:center;">
                
                <button type='submit' class="btn btn-success button1 wid" name="filter" value='fruits'  onclick=product()>product</button>
                <button type="submit" class="btn btn-info button1 wid" name="filt1er" onclick=stock() value='food'>stock</button>
                <button type="submit" class="btn btn-warning button1 wid" name="fi2lter" onclick=cost() value='dairy'>cost</button>
                <button type='submit' class="btn btn-danger button1 wid" name="fil4ter" onclick=showpurchase()  value='meat'>findproduct/findcustomer</button>
                <button type="submit" class="btn btn-dark button1 wid" name="fil32ter" onclick=showcustomer() value='cooldrinks'>findandupdate</button>
        <br>
        <form action="signup.php" method="POST" enctype="multipart/form-data" id='add' style="display:none;">
          <input type="text" placeholder="product name" name="pname"  class='form-control' style='width:300px' required/><br>
                    <input type="file"  name="img" accept="image/*" class='form-control' style='width:300px' required>
                    <br>
                    <input type="number" placeholder="cost" name="cost" class='form-control' style='width:300px'  required/><br>
                    <select name="type" class='form-control' style='width:300px'  >
                        <option value="vegetable">vegetable</option>
                        <option value="fruit">fruit</option>
                        <option value="dairy">dairyproduct</option>
                        <option value="meat">meat</option>
                        <option value="drinks">cooldrinks</option>
                        <option value="food">foodproducts</option>
                    </select><br>
                    <input type="text" placeholder="quantity(optional)" name="quantity"  class='form-control' style='width:300px'  /><br>

                    <input type="submit" value="uploadimage" class='form-control btn btn-success ' style='width:300px'  name="update1" >
                    <br></form>
                    <form action="signup.php" method="POST" enctype="multipart/form-data"   id="stock" style="display:none;"><br>
                    <input type='text' name='pname' placeholder="productname" class='form-control' style='width:300px'  required><br>
                    <input type='number' name='stock' placeholder="enter stock" class='form-control' style='width:300px'  required><br>

                    <input type="submit" value="updatestock" class='form-control btn btn-success' style='width:300px'  name="update1">
                    </p>
                    
                    </form>
                   





                

                    
                    <form action="signup.php" method="POST" enctype="multipart/form-data" id="cost" style="display:none;">
                        <input type='text' name='pname' placeholder="productname" class='form-control' style='width:300px'  required><br>
                        <input type='number' name='cost' placeholder="enter cost" class='form-control' style='width:300px'  required><br>

                        <input type="submit" value="updatecost" class='form-control btn btn-success' style='width:300px'  name="update1">
    
                        
                        </form>
                        <form action="admin.php" method="POST" enctype="multipart/form-data" id='find1' style="display:none;">
                        <input type="submit" value="showproducts"  class='form-control btn btn-warning' style='width:200px' name="find1">
                        <input type="submit" value="showorders"  class='form-control btn btn-warning' style='width:200px' name="find1"><br><br>
<br><br></form>



                     

                        <form action="admin.php" method="POST" enctype="multipart/form-data" id='find' style="display:none;">
                            <input type='text' name='name' class='form-control' style='width:300px'  placehorequired><br>
                            <input type="submit" value="findproduct"  class='form-control btn btn-info' style='width:300px' name="update1"><br><br>
                            <input type="submit" value="findcustomer" class='form-control btn btn-info' style='width:300px'  name="update1"><br><br>
                            <input type="submit" value="deleteproduct"  class='form-control btn btn-danger' style='width:300px' name="update1"><br><br>



                        </form>
                        <form action="admin.php" method="POST" enctype="multipart/form-data" id='update' style="display:none;">
                            <input type='number' name='ordno' placeholder="productname" class='form-control' style='width:300px'  required><br>
                            <input type="submit" value="findbyordno" class='form-control btn btn-info' style='width:300px'  name="update1"><br><br>
                            <input type="submit" value="delivered" class='form-control btn btn-success' style='width:300px'  name='update1'><br><br>
                            <input type="submit" value="cancelled"  class='form-control btn btn-danger' style='width:300px' name="update1"><br>
                        </form>
                    </p>
                        
                    
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $DB = "grocery";
        $conn = new mysqli($servername, $username, $password, $DB);
        if(isset($_POST['find1'])){
            $name=$_POST['find1'];
            if($name=='showproducts'){
                $sql="select * from product;";  
                $show=$conn->query($sql);
                $h1='productid';
                $h2='pname';
                $h3='quantity';
                $h4='cost';
                $h5='img';
                $h6='ptype';
                $h7='stock';
                echo "<table class='table table-borderless ' style='color:white;'>";

                echo "<tr><th>$h1</th><th>$h2</th><th>$h3</th><th>$h4</th><th>$h5</th><th>$h6</th><th>$h7</th></tr>";
              
                while($row=$show->fetch_assoc()){
                    echo "<tr><td>$row[pid]</td>
                    <td>$row[pname]</td>
                   
                    <td>$row[quantity]</td>
                    <td>$row[cost]</td>
                    <td><img src='image/$row[img]' style='max-width:70px;max-height:50px'></td>
                    <td>$row[ptype]</td>
                    
                    <td>$row[stock]</td></tr>";
                    
                
             


                }
                echo "</table>";
            }
            if($name=='showorders'){
                $sql="select * from purchasedetail  where status='tobedelivered';"; 
                $show=$conn->query($sql);
                $h1='cname';
                $h2='orderno';
                $h3='pname';
                $h4='quantity';
                $h5='cost';
                $h6='status';
                $h7='orderon';
                echo "<table class='table table-borderless ' style='color:white;'>";

                echo "<tr><th>$h1</th><th>$h2</th><th>$h3</th><th>$h4</th><th>$h5</th><th>$h6</th><th>$h7</th></tr>";
                while($row=$show->fetch_assoc()){
                    echo "<tr><td>$row[cname]</td>
                    <td>$row[ordno]</td>
                    <td>$row[pname]</td>
                    <td>$row[quantity]</td>
                    <td>$row[cost]</td>
                    <td>$row[status]</td>
                    <td>$row[orderon]</td></tr>";


            }
            echo "</table>";

        }
    }
         if(isset($_POST['update1'])){
             $val= $_POST['update1'];
             if($val=='deleteproduct'){
                $pname=$_POST['name'];
                echo "<script>
                var a=confirm('do u want to delete the $pname');
                if(a==true){
                 window.location.href='admin.php?product=$pname'
                 ;}
                else{
                 window.location.href='admin.php';}
             
             
             </script>";
             }
             if($val=='findcustomer'){
                 $cname=$_POST['name'];
                 $sql="select * from login where cname='$cname'";
                
                 
                 if($conn->query($sql)==TRUE)
                 {
                    $h1='cname';
                    $h2='orderno';
                    $h3='pname';
                    $h4='quantity';
                    $h5='cost';
                    $h6='status';
                    $h7='orderon';
                     $sql="select * from purchasedetail where cname='$cname';";
                    
                    
                     if($conn->query($sql)==TRUE){
                        $detail=$conn->query($sql);
                    }
                     else{
                         echo $sql.$conn->error;
                     }
                 }
                
                 
             }
             if($val=='findproduct'){
                $pname=$_POST['name'];
                $sql="select * from product where pname='$pname'";
                if($conn->query($sql)==TRUE){
                    $h1='productid';
                    $h2='pname';
                    $h3='quantity';
                    $h4='cost';
                    $h5='img';
                    $h6='ptype';
                    $h7='stock';
                    $detail=$conn->query($sql);
                }
           
                

             }
             if($val=="findbyordno" || $val=="delivered" || $val=="cancelled"){
               $ordno=$_POST['ordno'];      
               $h1='cname';
                    $h2='orderno';
                    $h3='pname';
                    $h4='quantity';
                    $h5='cost';
                    $h6='status';
                    $h7='orderon';          
                $sql="select * from purchasedetail where ordno=$ordno";
                if($conn->query($sql)==TRUE){
                   
                    if($val=="findbyordno"){
                        
                        $detail=$conn->query($sql);
                    }
                    if($val=="delivered" || $val=="cancelled"){
                        $detail=$conn->query($sql);
                        if($detail->num_rows>0){
                        $sql="update purchasedetail set status='$val' where ordno=$ordno;";
                        $conn->query($sql);
                        echo "<script>alert('update success');</script>";

                    
                        }
                        else{
                            echo "<script>alert(' orderno $ordno not found');</script>";
                       }
                        


                      
                    }

  
                }


            }
           
               
             if($val=='findcustomer' || $val=='findbyordno'){
               
                 $total=0;
              
                 if($detail->num_rows>0){
                   
                    echo "<table class='table table-borderless ' style='color:white;'>";

                    echo "<tr><th>$h1</th><th>$h2</th><th>$h3</th><th>$h4</th><th>$h5</th><th>$h6</th><th>$h7</th></tr>";
                    while($row=$detail->fetch_assoc()){
                        echo "<tr><td>$row[cname]</td>
                        <td>$row[ordno]</td>
                        <td>$row[pname]</td>
                        <td>$row[quantity]</td>
                        <td>$row[cost]</td>
                        <td>$row[status]</td>
                        <td>$row[orderon]</td></tr>";
                        $cname=$row['cname'];
                        if($row['status']=='delivered'){
                         $total=$row['cost']+$total;}
                        
                        
                    }
                   

                  
                    echo "</table>";
                    $sql="select * from login where cname='$cname'";
                    $row=$conn->query($sql);
                    
                    echo  "<p style='color:white'>total purchase=$total</p>";
                    while($rows=$row->fetch_assoc()){
                        echo   "<p style='color:white'>PHONENUMBER: <b>$rows[phonenumber]</p>;";}

              

                     
                 }
                 else{
                    echo "<script>alert(' details not found');</script>";
               }
                
             }
             if($val=='findproduct'){
                if($detail->num_rows>0){
                   echo "<table class='table table-borderless ' style='color:white;'>";

                   echo "<tr><th>$h1</th><th>$h2</th><th>$h3</th><th>$h4</th><th>$h5</th><th>$h6</th><th>$h7</th></tr>";
                   while($row=$detail->fetch_assoc()){
                       echo "<tr><td>$row[pid]</td>
                       <td>$row[pname]</td>
                      
                       <td>$row[quantity]</td>
                       <td>$row[cost]</td>
                       <td><img src='image/$row[img]' style='max-width:70px;max-height:50px'></td>
                       <td>$row[ptype]</td>
                       
                       <td>$row[stock]</td></tr>";
                       
                   }
                   echo "</table>";

             

                    
                }
                else{
                    echo "<script>alert(' details not found');</script>";
               }


            }
          

        }
        if(isset($_GET['msg'])){
         
            echo "<script>alert($_GET[msg]);</script>";
        }
        if(isset($_GET['product'])){
            $p=$_GET['product'];
            $pname='pname';
            if(is_numeric($p)){
           $pname='pid';
            }
            $sql="select * from product where $pname='$_GET[product]';";
            $r=$conn->query($sql);
            if($r->num_rows>0){
            $sql="delete from product where $pname='$_GET[product]';";
            if($conn->query($sql)==TRUE){
              
         
            echo "<script>alert('product $_GET[product] has been deleted');</script>";
        }
            else{
                echo $conn->error;
            }
        }
        else{
            echo "<script>alert('no product as $_GET[product]');</script>";

        }

        }
        

     ?>

    
        

        
                            
                            
  
    </div>

    
          
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
      </body>
    </html>
