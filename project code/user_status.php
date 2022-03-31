<?php

session_start();

?>



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <style>
        table,th,td{
            border:1px solid black;
        }
    </style>
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
<p style="float: left; position:absolute; top:95px">
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
  
</body>
</html>


    <div style="position: absolute; left: 15%; top: 150px">
        <div class="card mt-4">
        <div class="card body">
            <table class="table table-bordered">
        <thead>
            <tr>
              <th>User id</th> 
              <th>username</th>
              <th>Phone</th>
              <th> Join Date</th>
              <th> Age</th> 
              <th>Email</th>
              <th>Admin</th>
              <th>Book</th>

            </tr>
        </thead>

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

$sql=" select * from user";
$res=mysqli_query($data,$sql);

?>
<?php
      while($row=mysqli_fetch_assoc($res)): ?> 

      <tbody>
      <tr>
          <td><?php echo $row["user_id"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["u_ph"]; ?></td>
          <td><?php echo $row["ujd"]; ?></td>
          <td><?php echo $row["u_age"]; ?></td>
          <td><?php echo $row["u_email"]; ?></td>
          <td><?php echo $row["a_id"]; ?></td>
          <td><?php echo $row["b_id"]; ?></td>
          
          <form method="GET">
          <td>
               <a href="add_user.php?delete=<?php echo $row['user_id']; ?> "
                class="btn btn-danger">Delete</a>
           </td>
           </form>
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


