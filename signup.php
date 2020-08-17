<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "grocery";
$conn = new mysqli($servername, $username, $password, $DB);
$check="select * from login";
$validate=$conn->query($check);
$product="select * from product";
$show=$conn->query($product);
$value=0;
session_start();

if($conn->connect_error){echo "no connection";}

else{
    if(isset($_POST["login"])){
     $log=$_POST["login"];
     if($log=='admin'){
        $table='admin';
        $head='admin';
       $cname='name';
       $user='admin';
     }
     else{
        $table='login';
        $head='show';
        $cname='cname';
        $user='uname';
     }
      
     $sql="select * from $table where $cname='$_POST[name]'  and password='$_POST[password]'";
     $row=$conn->query($sql);
     if($row->num_rows){
         
      $_SESSION[$user]=$_POST['name'];
         $username=$_POST['name'];
        header("location: ../web/$head.php?username=$username");

     }
	 else{
		 header("location:../web/login.php?msg='username or password mismactch'");

     }
    }

     echo "hi";
    
    if(isset($_POST["phone"]))
    {
        echo "hi";
        if($_POST["password"]==$_POST["cpassword"]){
        if($validate->num_rows>0){
            while($row = $validate->fetch_assoc())
            {
    
                if($row['cname']==$_POST["name"] || $row['email']==$_POST['email'] ){
                    header("location:../web/login.php?msg='username or mail exist'");;
                       $value=1;}
                 if($value==1)
                        break;
                
            } }
            
        
        if($value==0){
               $sql="insert into login values('$_POST[name]','$_POST[password]','$_POST[email]','$_POST[phone]')";
               if ($conn->query($sql) === TRUE) {
                header("location: ../web/show.php?username=".$_POST[user_name]);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
        
   
}
else{
    header("location:../web/login.php?msg='password mismatch'");
}
}
  
     }

if(isset($_POST['logout'])){
    $user=$_SESSION["uname"];
    $sql="delete from cart where cname='$user'";
    $conn->query($sql);
    session_destroy();
    header("location:../web/login.php?msg='logged out successfully'");
}

if(isset($_POST["cancelorder"])){
    $a=$_POST['cancelorder'];
   echo "<script>
   var a=confirm('do u want to cancel the order');
   if(a==true){
    window.location.href='signup.php?ordno=$a'
    ;}
   else{
    window.location.href='showorder.php';}


</script>";}
if(isset($_POST['update1']))
{
    if(isset($_FILES['img'])){
        $file_name = $_FILES['img']['name'];
        $file_tmp =$_FILES['img']['tmp_name'];
        move_uploaded_file($file_tmp,"".$file_name);
        $pname=$_POST['pname'];
        $sql="select * from product where pname='$pname';";
        $h=1;
        echo $sql;
        if($conn->query($sql)==TRUE){
            $check1=$conn->query($sql);
            if($check1->num_rows>0){
                $h=0;
                
                header("location:..//web/admin.php?msg='PRODUCT ALREADY PRESENT'"); 
            }

        }
        else{
            echo $conn->error.$sql;
        }
       
        $cost=$_POST['cost'];
        
        $type=$_POST['type'];
        if($type=='drinks'){
            $q='1l';
        }
        else{
            $q='1kg';
        }
        if(!empty($_POST['quantity'] )){
            $q=$_POST['quantity'];
        }
        if($h==1){
        $sql="insert into product(pname,cost,img,ptype,quantity) values('$pname','$cost','$file_name','$type','$q')";
       
         if(  $conn->query($sql)===TRUE){
           
             
           header("location:..//web/admin.php?msg='NEW PRODUCT ADDED'");
        }

    else{
        echo $sql.$conn->error;
    }
}
else{
    header("location:..//web/admin.php?msg='PRODUCT ALREADY PRESENT'");
}
    
    }
   $val=$_POST['update1'];
   echo $val;
   if($val=='updatestock' || $val=='updatecost'){
    echo $val;
       
       $pname=$_POST['pname'];
       $sql="select * from product where pname='$pname';";
       $exist=$conn->query($sql);
       
       

      
       if($exist->num_rows){
           echo "hi";
          
           if(isset($_POST['stock'])){
               $stock=$_POST['stock'];
               $sql="update product set stock=$stock where pname='$pname'";
               $exist=$conn->query($sql);
               if($conn->query($sql)==TRUE){
                header("location:..//web/admin.php?msg='UPDATE SUCCESSFULL stock'");

               }
           }
           else{
            $cost=$_POST['cost'];
            $sql="update product set cost=$cost where pname='$pname'";
            $exist=$conn->query($sql);
            if($conn->query($sql)==TRUE){
                
             header("location:..//web/admin.php?msg='UPDATE SUCCESSFULL'");

            }


           }
       }
     else{
         header("location:..//web/admin.php?msg='no item available named $pname'");
         
     }
   }

   }
   if(isset($_GET['ordno'])){
    $sql="update purchasedetail set status='cancelled' where ordno=$_GET[ordno];";
    $conn->query($sql);
    header("location:..//web/showorder.php?ordno=$_GET[ordno]");
   }
   if(isset($_GET['admin'])){
       session_destroy();
       header("location:../web/login.php?msg='logged out successfully'");

   }
 
?>