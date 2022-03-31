<?php

$host="localhost";
$user="root";
$password="";
$db="library";

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data==false)
{
    die(" connection error");
}

if($_SERVER["REQUEST_METHOD"]=='POST')
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from admin where adminname='".$username."' and password='".$password."' ";

    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    

    if($row)
    {
        $id=$row["adminid"];
        $ad=$row["a_email"];
        $phone=$row["a_phone"];
        $_SESSION["id"]=$id;
        $_SESSION["email"]=$ad;
        $_SESSION["ph"]=$phone;
        $_SESSION["username"]=$username;
        header("location:adminpage.php");
    }

    else{
        echo " username or password incrrect";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body style="background-image:url('bg.jpg'); background-size: 100%; background-repeat: no-repeat;">
   
    <center>
        <BR></BR>
        <h1 style='color: rgb(230, 203, 206);'>LIBRARY MANAGEMENT </h1>
        <h1 style='color: rgb(230, 203, 206);'> SYSTEM </h1>
        </center>
<center>
    
<br>
<div style="background-color:rgb(214, 205, 205); width: 400px;">
    <br>
    <h1> ADMIN LOGIN</h1>
    <br>
    <h3>Sign into your account</h3>
    <br>

</div>
<br>
<br>
    </div>
        <br>
        <div style="background-color:rgb(197, 187, 187); width: 500px;">
            <br><br>
<form action="" method="POST">
    <div>
        <label>username</label>
        <input type= "text" name="username" required placeholder="username">
    </div>
    <br><br>

    <div>
    <label>password</label>
        <input type= "password" name="password" required placeholder="password">
    </div>
    <br><br>

    <div style= "color:rgb(59, 72, 196)">
    <input type= "submit" value="login" style="color:rgb(59, 59, 235);">
    </div>
    </form>
<br>
    </div>

</center>
</body>
</html>