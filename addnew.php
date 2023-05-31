<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        echo "<script>alert('Can\'t access! Login Required');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    .container{
      transform : translateY(30%);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a href="index.php" class="btn btn-success">Home</a>
            <div class="mybtn">
              <a class="mybtn btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
  </nav>
  <div class="container">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" class="form-control" value="<?php echo $id;?> "name="id" id="exampleFormControlInput1" placeholder="Enter Title">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Post Title</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Title">
      </div>
      <?php 
        if(isset($_SESSION['title_v'])){
          echo "<span style='color : red;'>".$_SESSION['title_v']."</span>";
          unset($_SESSION['title_v']);  
        }
      ?>
      <br>
      <div class="form-group">
        <label for="exampleFormControlFile1">Upload Image</label><br>
        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <?php 
        if(isset($_SESSION['image_v'])){
          echo "<span style='color : red;'>".$_SESSION['image_v']."</span>";
          unset($_SESSION['image_v']);  
        }
      ?>
      
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Post Description (in 50 words.)</label>
        <textarea class="form-control" maxlength="500" name="details" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <?php 
        if(isset($_SESSION['details_v'])){
          echo "<span style='color : red;'>".$_SESSION['details_v']."</span>";
          unset($_SESSION['details_v']);  
        }
      ?>
      <br>
      <div class="col-auto">
        <button type="submit" name="submit" class="btn btn-primary mb-2">Post</button>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>