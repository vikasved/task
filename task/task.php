<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
  <form action="task.php" method="POST">
  <div class="login">
  <div><h2>Data Form</h2></div></br>

  <div class="formdata"><label><b>Name :</b></label></div>
    <div class="formelem"><input type="text" name="name" placeholder="Name"></div></br>

  <div class="formdata"><label><b>City :</b></label></div>
  <div class="formelem"><input type="text" name="city" placeholder="City"></div></br>

  <div class="formdata"><label><b>Occupation :</b></label></div>
  <div class="formelem"><input type="text" name="occupation" placeholder="Occupation"></div></br>

  <div align="left"><button type="submit" class="btn btn-success" name="submit">Submit</button></div></br></br>
  </form>
</body>
</html>
<?php

 $con=mysqli_connect('localhost','test','Asdf@1234','test');
 error_reporting();
  
  if($con==False)
  {
    echo("Connection is not establish");
  }
  else
  {
   if(isset($_POST['submit']))
   {
    $name    = $_POST['name'];
    $city    = $_POST['city'];
    $occupation = $_POST['occupation'];
    
    $qry= "insert into formdata values(' ','$name','$city','$occupation')";
    $run = mysqli_query($con,$qry);
           
      if($run==true)
      {
  ?>
      <script>
        window.open('task.php','_self'); 
      </script>
  <?php
      }
      else
      {
  ?>
      <script>
        window.open('task.php','_self');
      </script>
  <?php
      }
    }
  }

  if($con==False)
  {
    echo("Connection is not establish");
  }
  else
  {
    $qry = "select * from formdata";
    $run = mysqli_query($con,$qry);
    
    if(mysqli_num_rows($run)>0)
    {

  ?>
  
  <h3 style="color:white; background-color: #007399;" align="center">Result Data</h3>
  <table style="width: 100%">
    <tr>
      <th>Name</th>
      <th>City</th>
      <th>Occupation</th> 
    </tr> 
      
  <?php
      while($data=mysqli_fetch_assoc($run))
     {
  ?>
      <tr>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['city'];?></td>
        <td><?php echo $data['occupation'];?></td>
      </tr>    
  <?php
      }
    }
    else
    {
      echo("No Data Found");
    }
  }
?>