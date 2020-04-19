<head>
 <meta charset="utf-8">
<link rel="stylesheet" href="../css/bootstrap.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<form method="post" action="">
<div class="container">
  <div class="form-group">
    <label for="studentcode">
Student Code:</label>
    <input type="text" class="form-control" size="30" name="masv">
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" size="30" name="name">
  </div>
  <div class="form-group">
    <label for="Phone">Phone:</label>
    <input type="text" class="form-control" size="30" name="sdt">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" size="30" name="email">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary">Reset</button>
  <?php
  include 'connect.php';
  if(isset($_POST["sub"])){
    echo "hello";
    $name=$_POST['name'];
    $masv=$_POST['masv'];
    $sdt=$_POST['sdt'];
    $email=$_POST['email'];
    if($name==""||$masv==""||$sdt==""||$email=="") 
    {
      echo "chua nhap day du";
    }else{
      $sql="INSERT INTO username( ma, ten, email, sdt) VALUES ('$masv','$name','$email','$sdt')";
      $ketnoi=mysqli_query($conn,$sql);
      if(!$ketnoi){
        echo "ko Thanh  cong";
      }else{

        echo "thanh cong";
      }

    }

  }



  ?>
  
</div>
</form>
</body>