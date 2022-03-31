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

$book=$_POST["bookname"];
$user=$_POST["user"];


$sql=" select * from book where b_tittle='".$book."' ";
$sql1=" select * from user where user_id='".$user."' ";

$res=mysqli_query($data,$sql);
$res1=mysqli_query($data,$sql1);

$row=mysqli_fetch_array($res);
$row1=mysqli_fetch_array($res1);


if( $row["availability"]=="YES" && $row1["b_id"]=="")
   {
    $set=$row["book_id"];
    $sql3=" update book set availability='NO' where b_tittle='$book' ";
    $sql4=" update user set b_id='$set' where user_id='$user' ";

    $res2=mysqli_query($data,$sql3);
    $res3=mysqli_query($data,$sql4);

    if( $res2 && $res3)
    {
        echo " book succesfully isued to";
        echo $row1["username"];
    }
else
{
    echo " unsecccufull try after sometime";
}

   }

   elseif($row["availability"]=="NO" && $row1["b_id"]==NULL)
   {
       echo "sorry the requested book is not available";
   }
   
   else{

    $sql5=" update book set availability='YES' where b_tittle='$book' ";
     $sql6=" update user set b_id=NULL where user_id='$user' ";

    $res4=mysqli_query($data,$sql5);
    $res5=mysqli_query($data,$sql6);

       if( $res4 && $res5)
    {
        echo " book succesfully returned from ";
        echo $row1["username"];
    }
else
{
    echo " unsecccufull try after sometime";
}
      
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
        <label>Book name</label>
        <input type= "text"  name="bookname">
             </div>
             <br>


                     <div >
                        <label>User id</label>
                        <input type= "text" name="user">
                             </div>
                             <br>

                   <br>
                
                  </div>
                  <br>
                </div>
                <div >
                  <input type="submit" name="submit" value=" Issue/Return">
                </div>
              </form>
              
            
              
        </div>
        </center>
        <br>
        <a href="adminpage.php">go back</a>
        <hr style="height: 5px; background-color: black;">
</body>
</html>