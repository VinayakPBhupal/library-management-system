<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <div style="background-color:rgb(221, 190, 195);">
    <h1>LIBRARY MANAGEMENT SYSTEM</h1>
    <br>
<p style="float: left; position:absolute; top: 95px">
    <?php 
      echo "User name: ";
     echo  $_SESSION["username"] ?> <br>
    
<?php 
      echo "User ID: ";
     echo  $_SESSION["id"] ?> <br>

     <p style="position: absolute; top: 8px; right: 16px;">
        <a href="logout.php">Log out</a>
    </p>

</p>

    <p style="text-align: right; ">
    <?php 
     echo "Phone.no: ";
    echo $_SESSION["ph"] ?> <br>
      
<?php 
     echo "E-mail: ";
    echo $_SESSION["email"] ?> <br>
</p>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="author.php">Authors</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ku.php">Know more</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ku.php">Contact us</a>
              </li>
            </ul>
        
          </div>
        </div>
      </nav>
      
  <br>
  <br>
  <br>
  <form method="POST">
  <div style="position: absolute; left: 35%; top: 300px;">
      <label>Search</label>
      <input type="text" name="name" placeholder="Search for books and author">
      <input type="submit" name="submit">


  </div>
  </form>

</body>
</html>

<br>
<br>
<br>

       


        <?php

$host="localhost";
$user="root";
$password="";
$db="library";


$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST["submit"]))
{
    $str=$_POST["name"];
    $sql="select book_id,b_tittle,author_name,availability,rowid,colid from book,author,location where author_id=a_id and book.b_no=location.b_no and (b_tittle='".$str."' or author_name='".$str."')";

    $result=mysqli_query($data,$sql);
    
    ?>

<br>
<br>
<br>

<div style="position: absolute; left: 25%; top: 350px">
        <div class="card mt-4">
        <div class="card body">
            <table class="table table-bordered">
        <thead>
            <tr>
              <th>Book id</th> 
              <th>Book tittle</th>
              <th>Author</th>
              <th>Availability</th>
              <th>Row</th> 
              <th>Col</th>
            

            </tr>
        </thead>

  <?php  while($row=mysqli_fetch_assoc($result)): ?>
        
       
        <tbody>
            <tr>
                <td><?php echo $row["book_id"]; ?></td>
                <td><?php echo $row["b_tittle"]; ?></td>
                <td><?php echo $row["author_name"]; ?></td>
                <td><?php echo $row["availability"]; ?></td>
                <td><?php echo $row["rowid"]; ?></td>
                <td><?php echo $row["colid"]; ?></td>
                

            </tr>
        </tbody>
        <?php endwhile; ?>
        </table>
    </div>
</div>
</div>
<?php
}   
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div style="background-color:rgb(82, 80, 80)">

<h1 style="color:linen;">BOOKS:</h1>

<div>
        <div class="card mt-4">
        <div class="card body">
            <table class="table table-bordered">
        <thead>
            <tr>
              <th>Book id</th> 
              <th>Tittle</th>
              <th>Auhtor</th>

            </tr>
        </thead>

 <?php
        
        
$sql1=" select book_id,b_tittle,author_name from book,author where author_id=a_id";
$res=mysqli_query($data,$sql1);

?>
<?php
      while($row1=mysqli_fetch_assoc($res)): ?> 

      <tbody>
      <tr>
          <td><?php echo $row1["book_id"]; ?></td>
          <td><?php echo $row1["b_tittle"]; ?></td>
          <td><?php echo $row1["author_name"]; ?></td>
        
      </tr>
      </tbody>
<?php endwhile; ?>

        </table>
    </div>
</div>
<br>
<br>
<br>
<hr style="height: 5px; background-color: black;">
</div>

</div>
