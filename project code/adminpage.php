<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td{
            border:1px solid black;
        }
    </style>
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
<br>
<br>
<br>
<br>
<br>

<div style="border-left: 5px solid black; height: 500px; position: absolute; left: 40%; margin-left: 3px; top: 180px;">
</div>
  <div style="background-color: linen; width: 200px; position:absolute; left: 10%;">
    <br>

     <center><a href="add_user.php">ADD USER</a>
     </center> 
      <br>
  </div>
<br>
  <br>
<br>
<br>
<br>
  <div style="background-color: linen; width: 200px; position:absolute; left: 10%;">
    <br>

     <center><a href="add_book.php">ADD BOOK</a>
     </center> 
      <br>
  </div>
  <br>

  <br>
  <br>
  <br>
  <br>


<div style="background-color: linen; width:200px; position:absolute; left: 10%;">
<br>
     <center><a href="user_status.php"> USER STATUS</a>
     </center> 
      <br>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

<div style="background-color: linen; width:200px; position:absolute; left: 10%;">
    <br>

     <center><a href="issue_book.php">ISSUE/RETURN BOOK</a>
     </center> 
      <br>
  </div>
  

 <form method="POST">
  <div style="position: absolute; left: 60%; top: 200px;">
      <label>Search</label>
      <input type="text" name="bookname" placeholder="Search for books">
      <input type="submit" name="submit">

  </div>
  </form>
</body>
</html>

<?php

$host="localhost";
$user="root";
$password="";
$db="library";


$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST["submit"]))
{
    $str=$_POST["bookname"];
    $sql="select * from book where b_tittle='".$str."' ";

    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    
    if($row)
    {
        ?>
       
        <div style="position: absolute; left: 43%; top: 300px">
        <div class="card mt-4">
        <div class="card body">
            <table class="table table-bordered">
        <thead>
            <tr>
              <th>Book id</th> 
              <th>Book tittle</th>
              <th>Book price</th>
              <th>Author id</th>
              <th>publisher Name</th> 
              <th>Block</th>
              <th>Availability</th>

            </tr>
        </thead>
       
        <tbody>
            <tr>
                <td><?php echo $row["book_id"]; ?></td>
                <td><?php echo $row["b_tittle"]; ?></td>
                <td><?php echo $row["b_price"]; ?></td>
                <td><?php echo $row["author_id"]; ?></td>
                <td><?php echo $row["p_name"]; ?></td>
                <td><?php echo $row["b_no"]; ?></td>
                <td><?php echo $row["availability"]; ?></td>

            </tr>
        </tbody>
        </table>
    </div>
</div>
</div>
<div style="position: absolute; left: 50%;"> 
        <?php       
    }


    else{
       echo "book doesnot exist";
    }
    
    
}
?>
</div>