<?php

session_start();

?>

<?php

$host="localhost";
$user="root";
$password="";
$db="library";

$data=mysqli_connect($host,$user,$password,$db);

if(!$data)
{
    die("connection failed");

}
if(isset($_POST["submit"]))
{
$uid=$_POST["id"];
$un=$_POST["username"];
$uph=$_POST["ph"];
$ujd=$_POST["jd"];
$uage=$_POST["age"];
$umail=$_POST["email"];
$uadm=$_POST["adminid"];

$upwd=$_POST["password"];

$sql=" insert into user (user_id,username,u_ph,ujd,u_age,u_email,a_id,password) VALUES ('$uid','$un','$uph','$ujd','$uage','$umail','$uadm','$upwd')";

$res=mysqli_query($data,$sql);

if($res)
{
  echo " successfully inserted";
}

else{
    echo " unsuccessfull";
}

}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql1=" delete from user where user_id=$id ";
    $res1=mysqli_query($data,$sql1);
   
    if($res1)
    {
        header("location:user_status.php");
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div style="background-color:rgb(221, 190, 195);">
        <h1>LIBRARY MANAGEMENT SYSTEM</h1>
        <br>

        <p style="float: left;">
        <?php 
          echo "Admin name: ";
         echo  $_SESSION["username"] ?> <br>
        
    <?php 
          echo "Admin ID: ";
         echo  $_SESSION["id"] ?> <br>
    
         <p style="position: absolute; top: 8px; right: 16px;">
         <a href="logout.php">Log out</a>
        </p>
    
    </p>
    
        <p style="text-align: right;">
        <?php 
         echo "Phone.no: ";
        echo $_SESSION["ph"] ?> <br>
          
    <?php 
         echo "E-mail: ";
        echo $_SESSION["email"] ?> <br>
    
        </p>
    
      </div>
      <br>
      <br>

    <center>
        
        <div style="background-color: lightgray; width:500px; top: 150px;">

            <form method="post">

                <br>

            <div >
        <label >User id</label>
        <input type= "text"  name="id">
             </div>
             <br>

            <div >
        <label>Username</label>
        <input type= "text"  name="username">
             </div>
             <br>

             <div >
                <label>Phone</label>
                <input type= "text" name="ph">
                     </div>
                     <br>

                     <div >
                        <label>Join Date</label>
                        <input type= "date" name="jd">
                             </div>
                             <br>

                     <div>
                        <label>Age</label>
                        <input type= "text" name="age">
                             </div>
                             <br>


                <div >
                  <label>Email</label>
                  <input type="email" name="email">
                </div>
                <br>

                <div >
                  <label>Admin</label>
                  <input type="text" name="adminid">
                </div>
                <br>

               


                <div >
                  <label>Password</label>
                  <input type="password"  name="password">
                </div>
                
                <br>
                
                  </div>
                  <br>
                </div>
                <div >
                  <input type="submit" name="submit" value=" Sign in">
                </div>
              </form>
              
            
              
        </div>
        </center>
        <br>
        <a href="adminpage.php">go back</a>
        <hr style="height: 5px; background-color: black;">
</body>
</html>