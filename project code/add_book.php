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
$bid=$_POST["id"];
$bkn=$_POST["bookname"];
$bp=$_POST["pr"];
$aid=$_POST["aid"];
$pn=$_POST["pname"];
$blk=$_POST["block"];
$avl=$_POST["avail"];

$upwd=$_POST["password"];

$sql=" insert into book (book_id,b_tittle,b_price,author_id,p_name,b_no,availability) VALUES ('$bid','$bkn','$bp','$aid','$pn','$blk','$avl')";

$res=mysqli_query($data,$sql);

if($res)
{
  echo " successfully inserted";
}

else{
    echo " unsuccessfull";
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
        <label >Book id</label>
        <input type= "text"  name="id">
             </div>
             <br>

            <div >
        <label>Book name</label>
        <input type= "text"  name="bookname">
             </div>
             <br>

             <div >
                <label>Price</label>
                <input type= "text" name="pr">
                     </div>
                     <br>

                     <div >
                        <label>Author id</label>
                        <input type= "text" name="aid">
                             </div>
                             <br>

                     <div>
                        <label>Publisher</label>
                        <input type= "text" name="pname">
                             </div>
                             <br>


                <div >
                  <label>Block</label>
                  <input type="text" name="block">
                </div>
                <br>

                <div >
                  <label>Availability</label>
                  <input type="text" name="avail">
                </div>
                <br>

            
                
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